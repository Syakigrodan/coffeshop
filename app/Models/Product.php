<?php

namespace App\Models;

use App\Models\CategoryProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function categoryProduct()
    {
        return $this->belongsTo(CategoryProduct::class);
    }
}
