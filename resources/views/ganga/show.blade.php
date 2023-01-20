@extends('layouts.base')
@section('title', 'Ganga ░▒▓ Severa')
@section('content')
    @section('h1', $ganga->title)
    <div class="row justify-content-center">
        <div class="row col-10 p-0 justify-content-center bg-info-subtle">
            <div class="col-6 p-0">
                <img class="w-100 text-center p-5" src="{{'/storage/'.$ganga->img_url }}" alt="{{ $ganga->title }}">
            </div>
            <div class="col-6 pt-5">
                <div class="col-6">
                    <p><strong>Categoría:</strong> {{ $ganga->category->name }}</p>
                    <p><strong>Preu (rebaixat):</strong> {{ $ganga->price_sale }} €</p>
                    <p><strong>Disponibilitat:</strong> {{ $ganga->available ? "Amb Stock" : "Sense Stock" }}</p>
                    <p><strong>M'agrada:</strong> {{ $ganga->likes }}</p>
                    <p><strong>No m'agrada:</strong> {{ $ganga->unlikes }}</p>
                    <p><strong>Pujat per:</strong> {{ $ganga->user->username }}</p>
                    <p><strong>Descripció:</strong><br/>{{ $ganga->description }}</p>
                </div>
            </div>
            <div>
                <ul class="list-unstyled row pb-5">
                    @if(auth()->check() && $ganga->user_id === auth()->user()->id)
                        <li class="col-6 text-center"><a class="btn btn-primary p-2" href="{{ route('ganga.edit', $ganga->id) }}"><i class="bi bi-pencil-square"></i> Editar</a></li>
                        <li class="col-6 text-center"><a class="btn btn-danger p-2" href="{{ route('ganga.destroy', $ganga->id) }}"><i class="bi bi-trash"></i> Eliminar</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection
