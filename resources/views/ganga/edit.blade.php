@extends('layouts.base')
@section('title', 'Ganga ░▒▓ Severa')
@section('content')
    @section('h1', 'Editar '.$ganga->title)
    <div class="row justify-content-center m-0">
        <form class="col-3 p-4 bg-info-subtle" action="{{ route('ganga.update', $ganga->id) }}" method="put">
            <div class="p-2">
                <label for="title">Títol:</label><br/>
                <input type="text" id="title" name="title" value="{{ $ganga->title }}">
            </div>
            <div class="p-2">
                <label for="img_url">Image:</label><br/>
                <input type="text" id="img_url" name="img_url" value="{{ $ganga->img_url }}">
            </div>
            <div class="p-2">
                <label for="category_id">Categoría:</label><br/>
                <input type="text" id="category_id" name="category_id" value="{{ $ganga->category_id }}">
            </div>
            <div class="p-2">
                <label for="price_sale">Preu en oferta:</label><br/>
                <input type="text" id="price_sale" name="price_sale" value="{{ $ganga->price_sale }}">
            </div>
            <div class="p-2">
                <label for="available">Disponible:</label>
                <input type="checkbox" id="available" name="available" value="{{ $ganga->available }}">
            </div>
            <div class="row justify-content-center m-0">
                <input class="btn btn-success col-4 m-2" type="submit" value="Cambiar datos">
            </div>
        </form>
    </div>
@endsection
