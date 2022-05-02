<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shop;

class QueryController extends Controller
{
    public function stock()
    {
        $producto = Product::orderBy('stock', 'desc')->first();

        return $producto;
    }

    public function product_shop()
    {
        $producto = Shop::select('products.*' ,'shops.products_id')->join('products','products_id','=','products.id')->groupBy('shops.products_id','products.id','products.name','products.reference','products.value','products.weight','products.categories_id','products.stock','products.created_at','products.updated_at')->havingRaw("COUNT(*) > 1")->get();

        return $producto;
    }
}
