<?php

namespace App\Http\Controllers;

use App\PdfFile;
use Illuminate\Http\Request;

class PdffileController extends Controller
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
        $pdffiles = PdfFile::simplePaginate(5);
        return view('pdffiles.index', compact('pdffiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pdffiles.create');
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
            
            'name' => 'required',
            'name_en' => 'required',
            'pdf_url' => 'required',
            'pdf_url_en' => 'required',
            'urun_pdf_id' => 'required'
            
        ],
        
         [
        'name.required' => 'name alanı zorunludur, boş bırakılamaz.',
        'name_en.required' => 'name_en zorunludur, boş bırakılamaz.',
        'pdf_url.required' => 'pdf_url alanı zorunludur, boş bırakılamaz.',
        'pdf_url_en.required' => 'pdf_url_en alanı zorunludur, boş bırakılamaz.',
        'urun_pdf_id.required' => 'urun_pdf_id alanı zorunludur, boş bırakılamaz.'
        
    ]);
        Pdffile::create($request->all());
        return redirect()->route('pdffiles.index')->with('success', 'Pdf File bilgileri başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PdfFile $pdffile
     * @return \Illuminate\Http\Response
     */
    public function show(PdfFile $pdffile)
    {
        //
        return view('pdffiles.show', compact('pdffile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PdfFile  $pdffile
     * @return \Illuminate\Http\Response
     */
    public function edit(PdfFile $pdffile)
    {
        //
        return view('pdffiles.edit', compact('pdffile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PdfFile $pdffile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PdfFile $pdffile)
    {
        //
        $request->validate([
            
            'name' => 'required',
            'name_en' => 'required',
            'pdf_url' => 'required',
            'pdf_url_en' => 'required',
            'urun_pdf_id' => 'required'
            
        ],
        
         [
        'name.required' => 'name alanı zorunludur, boş bırakılamaz.',
        'name_en.required' => 'name_en zorunludur, boş bırakılamaz.',
        'pdf_url.required' => 'pdf_url alanı zorunludur, boş bırakılamaz.',
        'pdf_url_en.required' => 'pdf_url_en alanı zorunludur, boş bırakılamaz.',
        'urun_pdf_id.required' => 'urun_pdf_id alanı zorunludur, boş bırakılamaz.'
    ]);
        $pdffile->update($request->all());
        return redirect()->route('pdffiles.index')->with('success', 'Pdf File bilgileri başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PdfFile $pdffile
     * @return \Illuminate\Http\Response
     */
    public function destroy(PdfFile $pdffile)
    {
        //
        $pdffile->delete();
        return redirect()->route('pdffiles.index')->with('success', 'Pdf File bilgileri başarıyla silindi.');
    }
    public function searchpdffile(Request $request)
    {
        $search=$request->get('searchpdffile');
        $pdffiles=PdfFile::where('pdf_url', 'like', '%' .$search. '%' )->paginate(200);
        return view('pdffiles.index', ['pdffiles' =>$pdffiles] );
    }
}