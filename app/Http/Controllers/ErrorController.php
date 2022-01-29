<?php

namespace App\Http\Controllers;

use App\Error;
use Illuminate\Http\Request;

class ErrorController extends Controller
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
        $errors = Error::simplePaginate(5);
        return view('errors.index', compact('errors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('errors.create');
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
            
            'hata_kodu' => 'required',
            'hata_kodu_en' => 'required',
            'urun_id' => 'required'
        ],
        
         [
        'hata_kodu.required' => 'hata_kodu alanı zorunludur, boş bırakılamaz.',
        'hata_kodu_en.required' => 'hata_kodu_en zorunludur, boş bırakılamaz.',
        'urun_id.required' => 'urun_id alanı zorunludur, boş bırakılamaz.'
        
    ]);
        Error::create($request->all());
        return redirect()->route('errors.index')->with('success', 'Hata bilgileri başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Error $error
     * @return \Illuminate\Http\Response
     */
    public function show(Error $error)
    {
        //
        return view('errors.show', compact('error'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Error  $error
     * @return \Illuminate\Http\Response
     */
    public function edit(Error $error)
    {
        //
        return view('errors.edit', compact('error'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Error $error
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Error $error)
    {
        //
        $request->validate([
            
            'hata_kodu' => 'required',
            'hata_kodu_en' => 'required',
            'urun_id' => 'required'
        ],
        
         [
        'hata_kodu.required' => 'hata_kodu alanı zorunludur, boş bırakılamaz.',
        'hata_kodu_en.required' => 'hata_kodu_en zorunludur, boş bırakılamaz.',
        'urun_id.required' => 'urun_id alanı zorunludur, boş bırakılamaz.'
    ]);
        $error->update($request->all());
        return redirect()->route('errors.index')->with('success', 'Hata bilgileri başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Error $error
     * @return \Illuminate\Http\Response
     */
    public function destroy(Error $error)
    {
        //
        $error->delete();
        return redirect()->route('errors.index')->with('success', 'Hata bilgileri başarıyla silindi.');
    }
    public function searcherror(Request $request)
    {
        $search=$request->get('searcherror');
        $errors=Error::where('hata_kodu', 'like', '%' .$search. '%' )->paginate(200);
        return view('errors.index', ['errors' =>$errors] );
    }
}