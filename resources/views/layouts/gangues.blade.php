<div class="row justify-content-center m-0">
    @include('layouts.paginator')
    @foreach($gangues ?? [] as $ganga)
        <div class="col-3 m-3 p-3 bg-info-subtle">
            <div class="text-center">
                <h2>{{ $ganga->title }}</h2>
            </div>
            <div class="justify-content-center">
                <img class="w-100" src="{{'/storage/'.$ganga->img_url }}" alt="{{ $ganga->title }}">
            </div>
            <div class="row">
                <div class="col-6">
                    <strong>Categoría:</strong>
                    <p>{{ $ganga->category->name }}</p>
                    <strong>Preu (rebaixat):</strong>
                    <p>{{ $ganga->price_sale }} €</p>
                    <strong>Disponibilitat:</strong>
                    <p>{{ $ganga->available ? "Amb Stock" : "Sense Stock" }}</p>
                </div>
                <div class="col-6">
                    <strong>M'agrada:</strong>
                    <p>{{ $ganga->likes }}</p>
                    <strong>No m'agrada:</strong>
                    <p>{{ $ganga->unlikes }}</p>
                </div>
            </div>
                <ul class="list-unstyled row d-flex justify-content-evenly">
                    <li class="col-2 text-center"><a class="btn btn-secondary p-2" href="{{ route('ganga.show', $ganga->id) }}"><i class="bi bi-eye"></i></a></li>
                    @if(auth()->check() && $ganga->user_id === auth()->user()->id)
                        <li class="col-2 text-center"><a class="btn btn-primary p-2" href="{{ route('ganga.edit', $ganga->id) }}"><i class="bi bi-pencil-square"></i></a></li>
                        <li class="col-2 text-center"><a class="btn btn-danger p-2" href="{{ route('ganga.destroy', $ganga->id) }}"><i class="bi bi-trash"></i></a></li>
                    @endif
                    <li class="{{ auth()->check() && $ganga->user_id === auth()->user()->id ? "col-6" : "col-10"}} text-end">Pujat per: {{ $ganga->user->username }}</li>
                </ul>
        </div>
    @endforeach
    @include('layouts.paginator')
</div>
