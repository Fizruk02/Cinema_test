@extends('layouts.login')
@section('content')
    <div class="container">
        <h1 class="text-center">Films</h1>
        <div class="row justify-content-center">
            @php $count = 0; @endphp
            @foreach($filteredFilms as $film)
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $film->title }}
                                @if($admin)
                                    <a href="{{ route('edit_film', ['film' => 'placeholder']) }}"><i class="fas fa-pencil-alt">Изменить</i></a>
                                @endif
                            </h5>
                            <p class="card-text">{{ $film->description }}</p>
                            <img src="{{ asset('storage/upload/film/' . $film->id . '.' . $film->type_photo) }}" alt="Film Image" class="img-fluid">
                            <p class="card-text">Дата сеанса:  {{ $film->date }}</p>
                            <p class="card-text">Цена: {{ $film->payment }}руб. </p>
                            <p class="card-text">Время:  {{ date('H:i:s', $film->duration) }}</p>
                            <p class="card-text">Возрастное ограничение: {{ $film->age_limit }}+</p>
                        </div>
                    </div>
                </div>
                @php $count++; @endphp
                @if($count % 2 == 0)
                    <div class="w-100"></div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
