@extends('layouts.login')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Film</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('update_film', ['film' => 'placeholder']) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ $film->title }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                                <div class="col-md-6">
                                    <textarea id="description" class="form-control" name="description" required></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="duration" class="col-md-4 col-form-label text-md-right">Duration</label>
                                <div class="col-md-6">
                                    <input id="duration" type="text" class="form-control" name="duration" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="age_limit" class="col-md-4 col-form-label text-md-right">Age Limit</label>
                                <div class="col-md-6">
                                    <input id="age_limit" type="number" class="form-control" name="age_limit" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
                                <div class="col-md-6">
                                    <input id="status" type="number" class="form-control" name="status" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
