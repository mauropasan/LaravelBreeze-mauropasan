<?php

namespace App\Http\Controllers;

use App\Models\Ganga;
use Illuminate\Http\Request;

class GangaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gangues = Ganga::orderBy('created_at', 'asc')->paginate(6);
        return view('ganga.index', compact('gangues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ganga.create');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ganga  $ganga
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ganga = Ganga::find($id);
        return view('ganga.show', compact('ganga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ganga  $ganga
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ganga = Ganga::find($id);
        return view('ganga.edit', compact('ganga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ganga  $ganga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ganga = Ganga::find($id);
        $ganga->update($request->all());
        return view('ganga.show', compact('ganga'))->with('success', "S'ha actualitzat la ganga correctament");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ganga  $ganga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ganga = Ganga::find($id);
        $ganga->delete();
        return redirect('/')->with('success', "S'ha eliminat la ganga ".$ganga->name." correctament.");
    }
}
