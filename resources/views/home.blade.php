@extends('layouts.app')

@section('styles')
    <link href="/css/cover.css" rel="stylesheet">
@endsection

@section('content')
    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand">Обери свій автомобіль!</h3>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link active" href="#">Головна</a>
                    <a class="nav-link" href="/questions">Тест</a>
                </nav>
            </div>
        </header>

        <main role="main" class="inner cover">
            <h1 class="cover-heading">Обери свій автомобіль!</h1>
            <p class="lead">У сучасному світі дуже зручно мати автомобіль. Він може використовуватися як для особистих цілей, так і для бізнесу. Власним автомобілем можна вирішити проблему переміщення в маленьких провінційних містах або за містом.</p>
        </main>

        <footer class="mastfoot mt-auto">
        </footer>
    </div>
@endsection

@section('js')
    <script src="/js/home.js"></script>
@endsection
