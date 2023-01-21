@extends('layouts.base')
@section('title', 'Ganga ░▒▓ Severa')
@section('content')
    @section('h1', 'Benvingut a Ganga ░▒▓ Severa!')
    <h2 class="text-center">
        @switch(request()->path())
            @case('/')
                Llistat de Gangues
                @break
            @case('gangues/newest')
                Gangues recents
                @break
            @case('gangues/featured')
                Gangues destacades
                @break
        @endswitch
    </h2>
    @include('layouts.gangues')
@endsection
