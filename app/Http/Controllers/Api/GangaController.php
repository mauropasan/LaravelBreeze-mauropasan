<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GangaResource;
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
        return GangaResource::collection(Ganga::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ganga = new Ganga();
        $ganga->title = $request->title;
        $ganga->description = $request->description;
        $ganga->img_url = $request->img_url;
        $ganga->likes = $request->likes;
        $ganga->unlikes = $request->unlikes;
        $ganga->category_id = $request->category_id;
        $ganga->price = $request->price;
        $ganga->price_sale = $request->price_sale;
        $ganga->available = $request->available;
        $ganga->user_id = auth()->user()->id;
        $ganga->save();
        return response()->json($ganga, '201');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ganga  $ganga
     * @return \Illuminate\Http\Response
     */
    public function show(Ganga $ganga)
    {
        return new GangaResource($ganga);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ganga  $ganga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ganga $ganga)
    {
        $ganga->title = $request->title;
        $ganga->description = $request->description;
        $ganga->img_url = $request->img_url;
        $ganga->category_id = $request->category_id;
        $ganga->likes = $request->likes ?? 0;
        $ganga->unlikes = $request->unlikes ?? 0;
        $ganga->price = $request->price;
        $ganga->price_sale = $request->price_sale;
        $ganga->available = $request->available;
        $ganga->update();
        return response()->json($ganga);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ganga  $ganga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ganga $ganga)
    {
        $ganga->delete();
        return response()->json(null, '204');
    }
}
