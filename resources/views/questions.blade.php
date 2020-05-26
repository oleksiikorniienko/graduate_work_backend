@extends('layouts.app-navbar')

@section('styles')
    <link href="/css/navbar-top.css" rel="stylesheet">
@endsection

@section('content')
    @parent

    <main role="main" class="container w-50">
        <form method="POST" action="/types/determine">
            {{ csrf_field() }}
            @foreach ($questions as $question)
                <div class="card mt-4 mb-4">
                    <div class="card-header">
                        <span>{{ $question->title }}</span>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            @foreach ($question->answers as $answer)
                                <div class="form-check mt-3 mb-3">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="questions[{{ $question->id }}]"
                                        id="{{ $question->id }}-{{ $answer->id }}"
                                        value="{{ $answer->value }}"
                                        required
                                    >
                                    <label class="form-check-label" for="{{ $question->id }}-{{ $answer->id }}">
                                        {{ $answer->title }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="card mt-4 mb-4">
                <div class="card-header">
                    <span>Какой тип наиболее важный?</span>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        @foreach ($properties as $property)
                            <div class="form-check mt-3 mb-3">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="max-priority"
                                    id="max-priority-{{ $property->id }}"
                                    value="{{ $property->id }}"
                                    required
                                >
                                <label class="form-check-label" for="max-priority-{{ $property->id }}">
                                    {{ $property->title }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card mt-4 mb-4">
                <div class="card-header">
                    <span>Какой тип наимение важный?</span>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        @foreach ($properties as $property)
                            <div class="form-check mt-3 mb-3">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="min-priority"
                                    id="min-priority-{{ $property->id }}"
                                    value="{{ $property->id }}"
                                    required
                                >
                                <label class="form-check-label" for="min-priority-{{ $property->id }}">
                                    {{ $property->title }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Определить подходящий тип автомобиля</button>
        </form>
    </main>
@endsection
