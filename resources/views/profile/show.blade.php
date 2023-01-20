@extends('layouts.base')
@section('title', 'Ganga ░▒▓ Severa')
@section('content')
    @section('h1', 'Les gangues de ' . $username)
    @include('layouts.gangues')
@endsection
