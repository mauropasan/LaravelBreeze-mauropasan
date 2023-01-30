<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GangaResource;
use App\Models\Ganga;
use Illuminate\Http\Request;

/**
 * @OA\Get(
 * path="/api/ganga",
 * summary="Get all gangues",
 * description="Get all gangues from database",
 * operationId="ganga@index",
 * tags={"gangues"},
 * @OA\Response(
 *    response=201,
 *    description="All gangues are recieved",
 * ),
 * )
 *
 * @OA\Get(
 * path="/api/ganga/{id}",
 * summary="Get a specified ganga",
 * description="Get a specified ganga from an id as parameter",
 * operationId="ganga@show",
 * tags={"gangues"},
 * @OA\Parameter(
 *     name="id",
 *     in="path",
 *     required=true,
 *     description="Ganga id to retrieve",
 *     @OA\Schema(
 *         type="integer",
 *     )
 * ),
 * @OA\Response(
 *    response=201,
 *    description="Ganga with id is retrieved succesfully",
 * ),
 * @OA\Response(
 *    response=404,
 *    description="Ganga with id was not found",
 * ),
 * )
 *
 * @OA\Post(
 * path="/api/ganga",
 * summary="Post a new ganga",
 * description="Create a new ganga and save it to the database",
 * operationId="ganga@create",
 * tags={"gangues"},
 * security={ {"apiAuth": {} }},
 * @OA\RequestBody(
 *    required=true,
 *    description="Send ganga data",
 *    @OA\JsonContent(
 *       required={"title","description","category_id","price","price_sale"},
 *       @OA\Property(property="title", type="string", example="A ganga title sample"),
 *       @OA\Property(property="description", type="string", example="A full ganga description sample"),
 *       @OA\Property(property="img_url", type="string", example="img/path.jpg"),
 *       @OA\Property(property="category_id", type="integer", example="1"),
 *       @OA\Property(property="price", type="double", example="30.50"),
 *       @OA\Property(property="price_sale", type="double", example="10.50"),
 *       @OA\Property(property="available", type="boolean", example="1"),
 *    ),
 * ),
 * @OA\Response(
 *    response=201,
 *    description="Ganga was saved to the database succesfully",
 * ),
 * @OA\Response(
 *    response=403,
 *    description="You don't have permissions to perform the action (No login)",
 * ),
 * )
 *
 * @OA\Put(
 * path="/api/ganga/{id}",
 * summary="Update a specified ganga",
 * description="Update the current specified ganga in the database",
 * operationId="ganga@update",
 * security={ {"apiAuth": {} }},
 * tags={"gangues"},
 * @OA\Parameter(
 *     name="id",
 *     in="path",
 *     required=true,
 *     description="Ganga id to update",
 *     @OA\Schema(
 *         type="integer",
 *     )
 * ),
 * @OA\RequestBody(
 *    required=true,
 *    description="Send ganga data",
 *    @OA\JsonContent(
 *       required={"title","description","category_id","price","price_sale"},
 *       @OA\Property(property="title", type="string", example="A ganga title sample"),
 *       @OA\Property(property="description", type="string", example="A full ganga description sample"),
 *       @OA\Property(property="img_url", type="string", example="img/path.jpg"),
 *       @OA\Property(property="category_id", type="integer", example="1"),
 *       @OA\Property(property="price", type="double", example="30.50"),
 *       @OA\Property(property="price_sale", type="double", example="10.50"),
 *       @OA\Property(property="available", type="boolean", example="1"),
 *    ),
 * ),
 * @OA\Response(
 *    response=201,
 *    description="Ganga was updated to the database succesfully",
 * ),
 * @OA\Response(
 *    response=403,
 *    description="You don't have permissions to perform the action (No login or no ownership over the ganga)",
 * ),
 * @OA\Response(
 *    response=404,
 *    description="Ganga with id was not found",
 * ),
 * )
 *
 * @OA\Delete(
 * path="/api/ganga/{id}",
 * summary="Delete a specified ganga",
 * description="Delete a specified ganga from the database",
 * operationId="ganga@destroy",
 * tags={"gangues"},
 * security={ {"apiAuth": {} }},
 * @OA\Parameter(
 *     name="id",
 *     in="path",
 *     required=true,
 *     description="Ganga id to delete",
 *     @OA\Schema(
 *         type="integer",
 *     )
 * ),
 * @OA\Response(
 *    response=200,
 *    description="Ganga was deleted from the database succesfully",
 * ),
 * @OA\Response(
 *    response=403,
 *    description="You don't have permissions to perform the action (No login or no ownership over the ganga)",
 * ),
 * @OA\Response(
 *    response=404,
 *    description="Ganga with id was not found",
 * ),
 * )
 */
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
        $ganga->likes = 0;
        $ganga->unlikes = 0;
        $ganga->category_id = $request->category_id;
        $ganga->price = $request->price;
        $ganga->price_sale = $request->price_sale;
        $ganga->available = $request->available;
        $ganga->user_id = auth()->user()->id;
        $ganga->save();
        return response()->json($ganga, '200');
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
    public function destroy($ganga)
    {
        $ganga = Ganga::find($ganga);
        $ganga->delete();
        return response()->json([ 'success' => 'Se ha eliminado la ganga correctamente'],'200');
    }
}
