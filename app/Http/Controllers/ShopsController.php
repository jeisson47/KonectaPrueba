<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Product;

class ShopsController extends Controller
{
    public function index()
    {
        $ventas = Shop::all();

        return view('ventas.index',compact('ventas'));
    }

    public function create()
    {
        $productos = Product::all();
        return view('ventas.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product' => 'exists:App\Models\Product,id',
        ]);

        $producto = Product::findOrFail($request->product);

        if($producto->stock <= 0){

            return redirect(route('shop.create'))->with('title', 'No se pudo crear la venta')->with('Body','No se pudo crear la venta por que no hay unidades');
        }else{
            $producto->stock = $producto->stock - 1;

            $venta = new Shop();
            $venta->product_name = $producto->name;
            $venta->products_id = $producto->id;
            $venta->value = $producto->value;

            $venta->save();
            $producto->save();
            return redirect(route('shop.index'));
        }
    }
}
