<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = DB::table('products');
        //$products = DB::table('products')->where('deleted_at',"=", null)->paginate(1);
        return View('products/index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('products/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'product_name' => 'required|min:5|max:50',
            'description' => 'required|min:5|max:100',
            'unit_price' => 'required',
            'stock' => 'required|min:5|max:8',
            'warranty' => 'required',
        ]);

        auth()->user()->productos()->create([
            'product_name' => $data['product_name'],
            'description' => $data['description'],
            'unit_price' => $data['unit_price'],
            'stock' => $data['stock'],
            'warranty' => $data['warranty'],
            'seller_id' => Auth::user()->id,
            //'created_at' => Carbon::now(),
            //'updated_at' => Carbon::now()
        ]);
        $products = auth()->user()->productos;

        return View('products.index')->with('products', $products);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $product)
    {
        //
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit(Productos $product)
    {
        //
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productos $product)
    {
        //
        $data = request()->validate([
            'product_name' => 'required|min:5|max:50',
            'description' => 'required|min:5|max:100',
            'unit_price' => 'required',
            'stock' => 'required|min:5|max:8',
            'warranty' => 'required',
        ]);

        $product->product_name = $data['product_name'];
        $product->description = $data['description'];
        $product->unit_price = $data['unit_price'];
        $product->stock = $data['stock'];
        $product->warranty = $data['warranty'];
        $product->save();

        $products = DB::table('productos');
        return View('products.index')->with('products', $products);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //$product = Productos::findOrFail($id);
        
        $resp = Productos::destroy($id);
        return response()->json(array('status' => true));
    }
}
