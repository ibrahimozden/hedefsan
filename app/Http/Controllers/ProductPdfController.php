<?php

namespace App\Http\Controllers;

use App\ProductPdf;
use Illuminate\Http\Request;

class ProductPdfController extends Controller
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
        $productpdfs = ProductPdf::simplePaginate(5);
        return view('productpdfs.index', compact('productpdfs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('productpdfs.create');
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
        ProductPdf::create($request->all());
        return redirect()->route('productpdfs.index')->with('success', 'Ürün Pdf bilgileri başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductPdf $productpdf
     * @return \Illuminate\Http\Response
     */
    public function show(ProductPdf $productpdf)
    {
        //
        return view('productpdfs.show', compact('productpdf'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductPdf $productpdf
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductPdf $productpdf)
    {
        //
        return view('productpdfs.edit', compact('productpdf'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductPdf $productpdf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductPdf $productpdf)
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
        $productpdf->update($request->all());
        return redirect()->route('productpdfs.index')->with('success', 'Ürün Pdf bilgileri başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductPdf $productpdf
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductPdf $productpdf)
    {
        //
        $productpdf->delete();
        return redirect()->route('productpdfs.index')->with('success', 'Ürün Pdf bilgileri başarıyla silindi.');
    }
    public function searchproductpdf(Request $request)
    {
        $search=$request->get('searchproductpdf');
        $productpdfs=ProductPdf::where('adi', 'like', '%' .$search. '%' )->paginate(200);
        return view('productpdfs.index', ['productpdfs' =>$productpdfs] );
    }
}