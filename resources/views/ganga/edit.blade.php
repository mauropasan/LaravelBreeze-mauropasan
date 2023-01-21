@extends('layouts.base')
@section('title', 'Ganga ░▒▓ Severa')
@section('content')
    @section('h1', 'Editar '.$ganga->title)
    <div class="row justify-content-center m-0">
        <form class="col-3 bg-info-subtle" action="{{ route('ganga.update', $ganga->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="p-2">
                <label for="title">Títol:</label><br/>
                <input class="w-100" type="text" id="title" name="title" value="{{ $ganga->title }}" required>
            </div>
            <div class="p-2">
                <label for="description">Descripció:</label><br/>
                <textarea class="w-100" id="description" name="description" rows="3" required>{{ $ganga->description }}</textarea>
            </div>
            <div class="p-2">
                <label for="img_url">Imatge:</label><br/>
                <input type="file" class="w-100" name="img_url" value="{{ $ganga->img_url ?? ""  }}" required>
            </div>
            <div class="p-2">
                <label for="category_id">Categoría:</label><br/>
                <select class="w-100" name="category_id" required>
                    <option value="">Selecciona una categoría</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $ganga->category_id === $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="p-2">
                <label for="price">Preu:</label><br/>
                <input class="w-100" type="text" id="price" name="price" value="{{ $ganga->price }}" required step="0.01">
            </div>
            <div class="p-2">
                <label for="price_sale">Preu en oferta:</label><br/>
                <input class="w-100" type="text" id="price_sale" name="price_sale" value="{{ $ganga->price_sale }}" required step="0.01">
            </div>
            <div class="p-2">
                <label for="available">Disponible:</label>
                <input type="checkbox" id="available" name="available" {{ old('available', $ganga->available) ? 'checked' : '' }}>
            </div>
            <div class="row justify-content-center m-0">
                <input class="btn btn-success col-4 m-2" type="submit" value="Actualitza ganga">
            </div>
        </form>
    </div>
@endsection
