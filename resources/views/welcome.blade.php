@extends('layouts.app')

@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Album example</h1>
            <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator,
                etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
            <p>
                <a href="#" class="btn btn-primary my-2">Main call to action</a>
                <a href="#" class="btn btn-secondary my-2">Secondary action</a>
            </p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            {{--<img class="card-img-top"
                                 data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail"
                                 alt="Card image cap">--}}
                            <a href="{{ route('product.show', ['id'=>$product->id]) }}">
                                <img class="card-img-top"
                                     src="{{ $product->image_url }}"
                                     alt="{{ $product->name }}">
                            </a>
                            <div class="card-body">
                                <h2 class="card-title">{{ $product->name }}</h2>
                                <p class="card-text">{{ str_limit($product->description, 20) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{ route('product.show', ['id'=>$product->id]) }}"
                                       class="btn btn-sm btn-outline-secondary">More info</a>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

@section('before_body_ends')

@endsection