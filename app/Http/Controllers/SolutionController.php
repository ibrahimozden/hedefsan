<?php

namespace App\Http\Controllers;

use App\Solution;
use Illuminate\Http\Request;

class SolutionController extends Controller
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
        $solutions = Solution::simplePaginate(5);
        return view('solutions.index', compact('solutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('solutions.create');
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
            
            'cozum_text' => 'required',
            'cozum_text_en' => 'required',
            'hata_id' => 'required'
        ],
        
         [
        'cozum_text.required' => 'cozum_text alanı zorunludur, boş bırakılamaz.',
        'cozum_text_en.required' => 'cozum_text_en zorunludur, boş bırakılamaz.',
        'hata_id.required' => 'hata_id alanı zorunludur, boş bırakılamaz.'
        
    ]);
        Solution::create($request->all());
        return redirect()->route('solutions.index')->with('success', 'Çözüm bilgileri başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Solution $solution
     * @return \Illuminate\Http\Response
     */
    public function show(Solution $solution)
    {
        //
        return view('solutions.show', compact('solution'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Solution  $solution
     * @return \Illuminate\Http\Response
     */
    public function edit(Solution $solution)
    {
        //
        return view('solutions.edit', compact('solution'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Solution $solution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solution $solution)
    {
        //
        $request->validate([
            
            'cozum_text' => 'required',
            'cozum_text_en' => 'required',
            'hata_id' => 'required'
        ],
        
         [
        'cozum_text.required' => 'cozum_text alanı zorunludur, boş bırakılamaz.',
        'cozum_text_en.required' => 'cozum_text_en zorunludur, boş bırakılamaz.',
        'hata_id.required' => 'hata_id alanı zorunludur, boş bırakılamaz.'
    ]);
        $solution->update($request->all());
        return redirect()->route('solutions.index')->with('success', 'Çözüm bilgileri başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Solution $solution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solution $solution)
    {
        //
        $solution->delete();
        return redirect()->route('solutions.index')->with('success', 'Çözüm bilgileri başarıyla silindi.');
    }
    public function searchsolution(Request $request)
    {
        $search=$request->get('searchsolution');
        $solutions=Solution::where('cozum_text', 'like', '%' .$search. '%' )->paginate(200);
        return view('solutions.index', ['solutions' =>$solutions] );
    }
}