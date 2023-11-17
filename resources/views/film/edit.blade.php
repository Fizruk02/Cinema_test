@extends('layouts.login')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Изменение сеанса</div>
                    @if(session()->has('message'))
                        <div class="alert alert-danger">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('film.update') }}" enctype="multipart/form-data">
                            @csrf
                            <input id="film_id" type="hidden" name="film_id" value="{{ $film->id }}" required>
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Название</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ $film->title }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Описание</label>
                                <div class="col-md-6">
                                    <textarea id="description" class="form-control" name="description" required>{{ $film->description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="duration" class="col-md-4 col-form-label text-md-right">Продолжительность</label>
                                <div class="col-md-6">
                                    <input id="duration" type="text" class="form-control" name="duration" value="{{ $film->duration }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="age_limit" class="col-md-4 col-form-label text-md-right">Возрастное ограничение</label>
                                <div class="col-md-6">
                                    <input id="age_limit" type="number" class="form-control" name="age_limit" value="{{ $film->age_limit }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">Статус сеанса</label>
                                <div class="col-md-6">
                                    <select id="film_id" name="status" class="form-control" required>
                                        <option value="1" @if($film->status == 1) selected @endif>В прокате</option>
                                        <option value="0" @if($film->status == 0) selected @endif>Убрать из проката</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date_timed" class="col-md-4 col-form-label text-md-right">Время сеанса</label>
                                <div class="col-md-6">
                                    <input id="date_time" type="datetime-local" class="form-control" name="date_time" value="{{ $film->date }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="payment" class="col-md-4 col-form-label text-md-right">Стоимость</label>
                                <div class="col-md-6">
                                    <input id="payment" type="text" class="form-control" name="payment" value="{{ $film->payment }}" required>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Сохронить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
