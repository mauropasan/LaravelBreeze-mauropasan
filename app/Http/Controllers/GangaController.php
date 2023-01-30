<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        if (!auth()->check()) {
            abort(403);
        }
        $categories = Category::all();
        return view('ganga.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->check()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:10',
            'img_url' => 'required|image',
            'category_id' => 'required|numeric',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'price_sale' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        $img = $request->file('img_url');

        $ganga = new Ganga;
        $ganga->title = $request->input('title');
        $ganga->description = $request->input('description');
        $ganga->img_url = "";
        $ganga->category_id = $request->input('category_id');
        $ganga->likes = 0;
        $ganga->unlikes = 0;
        $ganga->price = $request->input('price');
        $ganga->price_sale = $request->input('price_sale');
        $ganga->available = $request->filled('available') ? 1 : 0;
        $ganga->user_id = auth()->user()->id;
        $ganga->save();

        $id = $ganga->id;

        $path = $img->storeAs('img', $id.'-ganga-severa.'.$img->getClientOriginalExtension(), 'public');

        $ganga->img_url = '/storage/'.$path;
        $ganga->save();

        return redirect()->route('ganga.show', $ganga->id)->with('success', "S'ha guardat la ganga correctament");
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
        $categories = Category::all();
        return view('ganga.edit', compact('ganga'), compact('categories'));
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
        $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:10',
            'img_url' => 'required|image',
            'category_id' => 'required|numeric',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'price_sale' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        $ganga = Ganga::find($id);
        $available = $request->has('available') ? 1 : 0;
        $ganga->fill($request->toArray());
        $ganga->save();
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

    public function featured() {
        $gangues = Ganga::orderBy('likes', 'desc')->paginate(6);
        return view('ganga.index', compact('gangues'));
    }

    public function newest() {
        $gangues = Ganga::orderBy('created_at', 'desc')->paginate(6);
        return view('ganga.index', compact('gangues'));
    }
}
