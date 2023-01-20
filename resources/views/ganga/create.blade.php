@extends('layouts.base')
@section('title', 'Ganga ░▒▓ Severa')
@section('content')
    @section('h1', 'Crear una ganga nova')
    <div class="row justify-content-center m-0">
        <form class="col-3 p-4 bg-info-subtle" action="{{ route('ganga.create' }}" method="put">
            <div class="p-2">
                <label for="title">Títol:</label><br/>
                <input type="text" id="title" name="title"">
            </div>
            <div class="p-2">
                <label for="img_url">Image:</label><br/>
                <input type="text" id="img_url" name="img_url">
            </div>
            <div class="p-2">
                <label for="category_id">Categoría:</label><br/>
                <input type="text" id="category_id" name="category_id">
            </div>
            <div class="p-2">
                <label for="price_sale">Preu en oferta:</label><br/>
                <input type="text" id="price_sale" name="price_sale">
            </div>
            <div class="p-2">
                <label for="available">Disponible:</label>
                <input type="checkbox" id="available" name="available">
            </div>
            <div class="row justify-content-center m-0">
                <input class="btn btn-success col-4 m-2" type="submit" value="Crear ganga">
            </div>
        </form>
    </div>
@endsection
