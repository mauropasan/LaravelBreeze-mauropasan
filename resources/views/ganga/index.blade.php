@extends('layouts.nav')
@section('title', 'Ganga ░▒▓ Severa')
@section('content')
    <h1 class="text-red">Benvingut a Ganga ░▒▓ Severa!</h1>
    <h2>Gangues</h2>
        @foreach($gangues ?? [] as $ganga)
            <div>
                <img src="{{ $ganga->img_url }}" alt="{{ $ganga->img_url }}">
                <p>{{ $ganga->category_id }}</p>
                <p>{{ $ganga->likes }}</p>
                <p>{{ $ganga->unlikes }}</p>
                <p>{{ $ganga->price_sale }} €</p>
                <p>{{ $ganga->available ? "En Stock" : "Fuera de Stock" }}</p>
            </div>
        @endforeach
@endsection
