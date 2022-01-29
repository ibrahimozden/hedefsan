<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
     /**public function __construct()
    {
        $this->middleware('auth');
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $products = Product::simplePaginate(5);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            
            'adi' => 'required',
            'adi_en' => 'required'
           
        ],
        
         [
        'adi.required' => 'adi alanı zorunludur, boş bırakılamaz.',
        'adi_en.required' => 'adi_en zorunludur, boş bırakılamaz.'
        
    ]);
        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Ürün bilgileri başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $request->validate([
            
            'adi' => 'required',
            'adi_en' => 'required'
           
        ],
        
         [
        'adi.required' => 'adi alanı zorunludur, boş bırakılamaz.',
        'adi_en.required' => 'adi_en zorunludur, boş bırakılamaz.'
    ]);
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Ürün bilgileri başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Ürün bilgileri başarıyla silindi.');
    }
    public function searchproduct(Request $request)
    {
        $search=$request->get('searchproduct');
        $products=Product::where('adi', 'like', '%' .$search. '%' )->paginate(200);
        return view('products.index', ['products' =>$products] );
    }
}