@extends('layouts.login')

@section('content')
    <div class="container">
        <h1>Films</h1>
        <div class="row">
            @foreach($films as $film)
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $film->title }}</h5>
                            <p class="card-text">{{ $film->description }}</p>
                            <img src="{{ asset('storage/upload/film/'.$film->id.'.'.$film->type_photo) }}" alt="Film Image" class="img-fluid">
                            <p class="card-text">Дата сеанса:  {{ $film->date }}</p>
                            <p class="card-text">Цена: {{ $film->payment }}руб. </p>
                            <p class="card-text">Время:  {{ date('H:i:s', $film->duration) }}</p>
                            <p class="card-text">Возрастное ограничение: {{ $film->age_limit }}+</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
