<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categorie;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Product::select('categories.name_category','products.*')->join('categories','products.categories_id','=','categories.id')->get();

        return view('productos.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categorie::all();
        return view('productos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'reference' => 'required|string|max:255',
            'value' => 'required|integer',
            'weight' => 'required|integer',
            'stock' => 'required|integer',
            'categories' => 'exists:App\Models\Categorie,id',
        ]);

        $producto = new Product();
        $producto->name = $request->name;
        $producto->reference = $request->reference;
        $producto->value = $request->value;
        $producto->weight = $request->weight;
        $producto->categories_id = $request->categories;
        $producto->stock = $request->stock;

        $producto->save();

        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Product::select('categories.name_category','products.*')->join('categories','products.categories_id','=','categories.id')->where('products.id',$id)->first();

        if(empty($producto->id)){
            abort(404);
        }

        return view('productos.show',compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = Categorie::all();
        $producto = Product::findOrFail($id);

        return view('productos.edit', compact('categorias','producto'));

        


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'reference' => 'required|string|max:255',
            'value' => 'required|integer',
            'weight' => 'required|integer',
            'stock' => 'required|integer',
            'categories' => 'exists:App\Models\Categorie,id',
        ]);

        $producto = Product::findOrFail($id);

        $producto->name = $request->name;
        $producto->reference = $request->reference;
        $producto->value = $request->value;
        $producto->weight = $request->weight;
        $producto->categories_id = $request->categories;
        $producto->stock = $request->stock;

        $producto->save();

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prodcuto = Product::findOrFail($id);
    
        $prodcuto->delete();
        return redirect(route('products.index'));
    }
}
