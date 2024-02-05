<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ActivityHistory;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.manager.product.index', [
            'title' => 'Products',
            'products' => Product::paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.manager.product.create', [
            'title' => 'Create Product',
            'category_products' => CategoryProduct::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'category_product_id' => 'required',
            'image' => 'image|file|max:1024',
        ]);

        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('product-images');
        }
        $data = Product::create($data);

        $user = Auth::user();

        $activity = [
            'fullname' => $user->fullname,
            'position' => optional($user->position)->position_name,
            'action' => 'Delete Data Product',
            'description' => 'Product has been Delete Successfully',
        ];

        ActivityHistory::create($activity);

        return redirect('/dashboard/manager/products')->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('dashboard.manager.product.edit', [
            'title' => 'Edit Product',
            'product' => $product,
            'category_products' => CategoryProduct::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'category_product_id' => 'required',
            'image' => 'image|file|max:1024',
        ];

        $data = $request->validate($rules);

        if ($request->file('image')) {
            if ($product->image) {
                Storage::delete($product->image);
            }
            $data['image'] = $request->file('image')->store('product-images');
        }

        Product::where('id', $product->id)->update($data);

        $user = Auth::user();

        $activity = [
            'fullname' => $user->fullname,
            'position' => optional($user->position)->position_name,
            'action' => 'Delete Data Product',
            'description' => 'Product has been Delete Successfully',
        ];

        ActivityHistory::create($activity);
        return redirect('/dashboard/manager/products')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);

        $user = Auth::user();

        $activity = [
            'fullname' => $user->fullname,
            'position' => optional($user->position)->position_name,
            'action' => 'Delete Data Category Product',
            'description' => 'Product has been Delete Successfully',
        ];

        ActivityHistory::create($activity);
        return redirect('/dashboard/manager/products')->with('success', 'Product has been deleted successfully.');
    }
}
