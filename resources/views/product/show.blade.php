@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6"><img class="img-fluid" src="{{ $product->image_url }}" alt=""></div>
            <div class="col-md-6">
                <h1>{{ $product->name }}</h1>
                <div><strong>Highest Bid:</strong> R{{ $product->getHighestBidAmount() }}</div>
                <div><strong>Average Bid:</strong> R{{ $product->getAverageBidAmount() }}</div>
                @if($product->isBidPlacedByCurrentUser())
                    <div><strong>Your Bid:</strong>R{{ $product->getBidByCurrentUser()->amount }} <a
                                href="{{ route('bid.not-me') }}"><em>This wasn't me</em></a></div>
                @endif

                <div class="mt-4 mb-4">
                    @if( ! $product->isBidPlacedByCurrentUser())
                        <h4>Place a bid:</h4>
                    @endif
                    <div>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success">
                                Bit place successfully.
                            </div>
                        @endif
                        @if( ! $product->isBidPlacedByCurrentUser())
                            <form method="POST" action="{{ route('bid.store') }}" class="d-md-flex flex-row">
                                {{ csrf_field() }}
                                <input type="hidden" name="product_id" value="{{ $product->id }}" required>
                                <input data-inputmask="'alias': 'email'" class="mr-md-2 p-2 flex-md-grow-1" type="text"
                                       name="email" placeholder="email" value="{{ old('email') }}" required>
                                <input class="mr-md-2 p-2" type="text" name="price" placeholder="price"
                                       value="{{ old('price') }}"
                                       data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': 'R ', 'placeholder': '0'">
                                <button type="submit">Place bid</button>
                            </form>
                        @endif
                    </div>
                </div>

                {{--<p>{{ $product->description }}</p>--}}
            </div>
        </div>
    </div>
@endsection

@section('before_body_ends')

@endsection