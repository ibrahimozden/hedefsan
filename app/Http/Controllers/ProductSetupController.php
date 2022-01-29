<?php

namespace App\Http\Controllers;

use App\ProductSetup;
use Illuminate\Http\Request;

class ProductSetupController extends Controller
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
        $productsetups = ProductSetup::simplePaginate(5);
        return view('productsetups.index', compact('productsetups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('productsetups.create');
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
        ProductSetup::create($request->all());
        return redirect()->route('productsetups.index')->with('success', 'Ürün Kurulum bilgileri başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductSetup $productsetup
     * @return \Illuminate\Http\Response
     */
    public function show(ProductSetup $productsetup)
    {
        //
        return view('productsetups.show', compact('productsetup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductSetup $productsetup
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductSetup $productsetup)
    {
        //
        return view('productsetups.edit', compact('productsetup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductSetup $productsetup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductSetup $productsetup)
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
        $productsetup->update($request->all());
        return redirect()->route('productsetups.index')->with('success', 'Ürün Kurulum bilgileri başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductSetup $productsetup
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductSetup $productsetup)
    {
        //
        $productsetup->delete();
        return redirect()->route('productsetups.index')->with('success', 'Ürün Kurulum bilgileri başarıyla silindi.');
    }
    public function searchproductsetup(Request $request)
    {
        $search=$request->get('searchproductsetup');
        $productsetups=ProductSetup::where('adi', 'like', '%' .$search. '%' )->paginate(200);
        return view('productsetups.index', ['productsetups' =>$productsetups] );
    }
}