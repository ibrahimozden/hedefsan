<?php

namespace App\Http\Controllers;

use App\InstallationType;
use Illuminate\Http\Request;

class InstallationTypeController extends Controller
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
        $installationtypes = InstallationType::simplePaginate(5);
        return view('installationtypes.index', compact('installationtypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('installationtypes.create');
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
            
            'tur' => 'required',
            'tur_en' => 'required',
            'kurulum_urun_id' => 'required'
        ],
        
         [
        'tur.required' => 'tur alanı zorunludur, boş bırakılamaz.',
        'tur_en.required' => 'tur_en zorunludur, boş bırakılamaz.',
        'kurulum_urun_id.required' => 'kurulum_urun_id alanı zorunludur, boş bırakılamaz.'
        
    ]);
        InstallationType::create($request->all());
        return redirect()->route('installationtypes.index')->with('success', 'Kurulum Türü bilgileri başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InstallationType $installationtype
     * @return \Illuminate\Http\Response
     */
    public function show(InstallationType $installationtype)
    {
        //
        return view('installationtypes.show', compact('installationtype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InstallationType   $installationtype
     * @return \Illuminate\Http\Response
     */
    public function edit(InstallationType  $installationtype)
    {
        //
        return view('installationtypes.edit', compact('installationtype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InstallationType   $installationtype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InstallationType $installationtype)
    {
        //
        $request->validate([
            
            'tur' => 'required',
            'tur_en' => 'required',
            'kurulum_urun_id' => 'required'
        ],
        
         [
        'tur.required' => 'tur alanı zorunludur, boş bırakılamaz.',
        'tur_en.required' => 'tur_en zorunludur, boş bırakılamaz.',
        'kurulum_urun_id.required' => 'kurulum_urun_id alanı zorunludur, boş bırakılamaz.'
    ]);
        $installationtype->update($request->all());
        return redirect()->route('installationtypes.index')->with('success', 'Kurulum Türü bilgileri başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InstallationType   $installationtype
     * @return \Illuminate\Http\Response
     */
    public function destroy(InstallationType   $installationtype)
    {
        //
        $installationtype->delete();
        return redirect()->route('installationtypes.index')->with('success', 'Kurulum Türü bilgileri başarıyla silindi.');
    }
    public function searchinstallationtype(Request $request)
    {
        $search=$request->get('searchinstallationtype');
        $installationtypes=InstallationType::where('tur', 'like', '%' .$search. '%' )->paginate(200);
        return view('installationtypes.index', ['installationtypes' =>$installationtypes] );
    }
}