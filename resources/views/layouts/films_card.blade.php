<div class="container">
    <h1>Films</h1>
    <div class="row">
        @foreach($films as $film)
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $film->title }}</h5>
                        <p class="card-text">{{ $film->description }}</p>
                        <p class="card-text">Продолжительность:  {{ date('H:i', $film->duration) }}</p>
                        <p class="card-text">Дата сенаса:  {{ $film->date }}</p>
                        <p class="card-text">Возрастное ограничение: {{ $film->age_limit }}+</p>
                        <p class="card-text">Цена: {{ $film->payment }}руб. </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
