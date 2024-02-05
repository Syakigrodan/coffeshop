<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\ActivityHistory;
use App\Models\DetailTransaction;
use Illuminate\Support\Facades\Auth;

class CashierController extends Controller
{
    public function index()
    {
        return view('dashboard.cashier.index', [
            'title' => "Products",
            'products' => Product::Paginate(8),
        ]);
    }

    public function searchProduct(Request $request)
    {
        $search = request('search');
        $products = Product::where('product_name', 'like', '%' . $search . '%')->paginate(8);
        return view('dashboard.cashier.index', [
            'title' => "Products",
            'products' => $products,
        ]);
    }

    public function cart()
    {
        $cart = session()->get('cart');

        return view('dashboard.cashier.cart.cart', [
            'title' => "Cart",
            'cart' => $cart,
        ]);
    }

    public function addToCart(Product $product)
    {
        $cart = session()->get('cart', []);

        $cart[$product->id] = [
            "product_name" => $product->product_name,
            "price" => $product->price,
            "quantity" => 1,
        ];

        session()->put('cart', $cart);

        return redirect('/dashboard/cashier/cart/');
    }

    public function deleteCart(Product $product)
    {
        $cart = session()->get('cart');

        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            session()->put('cart', $cart);
        }

        return redirect()
            ->back()
            ->with('success', 'Product removed from cart.');
    }

    public function addTransaction(Product $product)
    {
        $cart = session()->get('cart');
        $totalPrice = 0;
        $transaction = Transaction::create([
            'date_transaction' => now()->format('Y-m-d'),
            'user_id' => Auth::user()->id,
        ]);

        $transaction_id = $transaction->id;
        foreach ($cart as $id_product => $val) {
            $quantity = $val['quantity'];

            DetailTransaction::create([
                'transaction_id' => $transaction_id,
                'product_name' => $val['product_name'],
                'price' => $val['price'],
                'quantity' => $quantity,
            ]);

            $productPrice = $product->find($id_product)->price;
            $totalPrice += $productPrice * $quantity;
        }

        $transaction->total_price = $totalPrice;
        $transaction->save();

        $user = Auth::user();

        $activity = [
            'fullname' => $user->fullname,
            'position' => optional($user->position)->position_name,
            'action' => 'Transaction',
            'description' => 'Transaction success',
        ];
        ActivityHistory::create($activity);

        session()->forget('cart');

        return redirect('dashboard/cashier/cart')->with('success', 'Transaction successfully.');
    }

    public function myTransaction()
    {
        return view('dashboard.cashier.myTransaction.myTransaction', [
            'title' => "My Transaction",
            'myTransactions' => Transaction::where('user_id', Auth::user()->id)->paginate(15),
        ]);
    }

    public function myTransactionFilterDate(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $myTransactions = new Transaction();
        $myTransactionFilterDate = $myTransactions->myTransactionFilterDate($startDate, $endDate);

        return view('dashboard.cashier.myTransaction.myTransaction', [
            'title' => "My Transaction",
            'myTransactions' => $myTransactionFilterDate,
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('logout', 'You have successfully logged out.');
    }
}
