@extends('layouts.login')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Назначить сеанс</div>
                @if(session()->has('message'))
                    <div class="alert alert-danger">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('session.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="film_id" class="col-md-4 col-form-label text-md-right">Фильм</label>
                            <div class="col-md-6">
                                <select id="film_id" name="film_id" class="form-control" required>
                                    @foreach($films as $film)
                                        <option value="{{ $film->id }}">{{ $film->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date_timed" class="col-md-4 col-form-label text-md-right">Время сеанса</label>
                            <div class="col-md-6">
                                <input id="date_time" type="datetime-local" class="form-control" name="date_time" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="payment" class="col-md-4 col-form-label text-md-right">Стоимость</label>
                            <div class="col-md-6">
                                <input id="payment" type="text" class="form-control" name="payment" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
