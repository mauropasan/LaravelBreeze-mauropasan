@extends('layouts.base')
@section('title', 'Ganga ░▒▓ Severa')
@section('content')
    @section('h1', 'Crear una ganga nova')
    <div class="row justify-content-center m-0">
        <form class="col-3 bg-info-subtle" action="{{ route('ganga.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="p-2">
                <label for="title">Títol:</label><br/>
                <input class="w-100" type="text" id="title" name="title" value="{!! old('title') !!}" required>
            </div>
            <div class="p-2">
                <label for="description">Descripció:</label><br/>
                <textarea class="w-100" id="description" name="description" rows="3" required>{!! old('description') !!}</textarea>
            </div>
            <div class="p-2">
                <label for="img_url">Imatge:</label><br/>
                <input type="file" name="img_url" class="w-100" required value="{{ old('img_url') }}">
            </div>
            <div class="p-2">
                <label for="category_id">Categoría:</label><br/>
                <select class="w-100" name="category_id" required>
                    <option value="">Selecciona una categoría</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }} <?= $category->id === old('category_id') ? "selected" : "" ?></option>
                    @endforeach
                </select>
            </div>
            <div class="p-2">
                <label for="price">Preu:</label><br/>
                <input class="w-100" type="text" id="price" name="price" value="{!! old('price') !!}" required step="0.01">
            </div>
            <div class="p-2">
                <label for="price_sale">Preu en oferta:</label><br/>
                <input class="w-100" type="text" id="price_sale" name="price_sale" value="{!! old('price_sale') !!}" required step="0.01">
            </div>
            <div class="p-2">
                <label for="available">Disponible:</label>
                <input type="checkbox" id="available" name="available" value="{!! old('checked') !!}" checked>
            </div>
            <div class="row justify-content-center m-0">
                <input class="btn btn-success col-4 m-2" type="submit" value="Crear ganga">
            </div>
        </form>
    </div>
@endsection
