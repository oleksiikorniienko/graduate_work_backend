@extends('layouts.app-navbar')

@section('styles')
    <link href="/css/navbar-top.css" rel="stylesheet">
@endsection

@section('content')
    @parent

    <main role="main" class="container w-50 mb-5">
        <div class="card w-100">
            <img
                src="{{ $type->image_link }}"
                class="card-img-top"
                alt="{{ $type->title }}"
            >
            <div class="card-body">
                <h4 class="text-center">{{ $type->title }}</h4>
                <div class="text-justify">{{ $type->description }}</div>
            </div>
        </div>
    </main>
@endsection
