@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <a class="navbar-brand" href="#">Обери свій автомобіль!</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Головна</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/questions">Тест</a>
                </li>
            </ul>
        </div>
    </nav>
@endsection
