<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Films</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Films</h1>
    <div class="row">
        @foreach($films as $film)
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $film->title }}</h5>
                        <p class="card-text">{{ $film->description }}</p>
                        <p class="card-text">Время:  {{ date('H:i', $film->duration) }}</p>
                        <p class="card-text">Возрастное ограничение: {{ $film->age_limit }}+</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
