<?php

namespace App\Http\Controllers;

use App\Setup;
use Illuminate\Http\Request;

class SetupController extends Controller
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
        $setups = Setup::simplePaginate(5);
        return view('setups.index', compact('setups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('setups.create');
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
            
            'kurulum' => 'required',
            'kurulum_en' => 'required',
            'kurulum_turu_id' => 'required'
        ],
        
         [
        'kurulum.required' => 'Kurulum alanı zorunludur, boş bırakılamaz.',
        'kurulum_en.required' => 'Kurulum_en zorunludur, boş bırakılamaz.',
        'kurulum_turu_id.required' => 'Kurulum_turu_id alanı zorunludur, boş bırakılamaz.'
        
    ]);
        Setup::create($request->all());
        return redirect()->route('setups.index')->with('success', 'Kurulum bilgileri başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setup $setup
     * @return \Illuminate\Http\Response
     */
    public function show(Setup $setup)
    {
        //
        return view('setups.show', compact('setup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setup  $setup
     * @return \Illuminate\Http\Response
     */
    public function edit(Setup $setup)
    {
        //
        return view('setups.edit', compact('setup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setup  $setup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setup $setup)
    {
        //
        $request->validate([
            
            'kurulum' => 'required',
            'kurulum_en' => 'required',
            'kurulum_turu_id' => 'required'
          

        ],
        
         [
            'kurulum.required' => 'Kurulum alanı zorunludur, boş bırakılamaz.',
            'kurulum_en.required' => 'Kurulum_en zorunludur, boş bırakılamaz.',
            'kurulum_turu_id.required' => 'Kurulum_turu_id alanı zorunludur, boş bırakılamaz.'
    ]);
        $setup->update($request->all());
        return redirect()->route('setups.index')->with('success', 'Kurulum bilgileri başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setup $setup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setup $setup)
    {
        //
        $setup->delete();
        return redirect()->route('setups.index')->with('success', 'Kurulum bilgileri başarıyla silindi.');
    }
    public function searchsetup(Request $request)
    {
        $search=$request->get('searchsetup');
        $setups=Setup::where('kurulum', 'like', '%' .$search. '%' )->paginate(200);
        return view('setups.index', ['setups' =>$setups] );
    }
}
