@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <img class="img-fluid"
                     data-src="holder.js/540px400?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail"
                     alt="{{ $product->name }}">
                {{--<img class="img-fluid" src="{{ $product->image_url }}" alt="{{ $product->name }}">--}}
            </div>
            <div class="col-md-6">
                <h1>{{ $product->name }}</h1>
                <div class="bid-details mt-5">
                    <table class="table table-striped table-lg">
                        <tr>
                            <td>Highest Bid:</td>
                            <td>R {{ $product->getHighestBidAmount() }}</td>
                        </tr>
                        <tr>
                            <td>Average Bid:</td>
                            <td>R {{ $product->getAverageBidAmount() }}</td>
                        </tr>
                        @if($product->isBidPlacedByCurrentUser())
                            <tr>
                                <td>Your Bid:</td>
                                <td>R {{ $product->getBidByCurrentUser()->amount }}<a class="float-right"
                                            href="{{ route('bid.not-me') }}"><em><small>This wasn't me</small></em></a></td>
                            </tr>
                        @endif

                    </table>

                </div>

                <div class="mt-4 mb-4">
                    @if( ! $product->isBidPlacedByCurrentUser())
                        <h4 class="product_name">Place a bid:</h4>
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
                                <input data-inputmask="'alias': 'email'" class="mr-md-2 p-2 flex-md-grow-1 form-control" type="text"
                                       name="email" placeholder="email" value="{{ old('email', $product->getBidderEmail()) }}" required>
                                <input class="mr-md-2 p-2 form-control" type="text" name="amount" placeholder="amount"
                                       value="{{ old('price') }}"
                                       data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': 'R ', 'placeholder': '0'">
                                <button class="btn btn-success" type="submit"><strong>Place bid</strong></button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>

        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <p>{{ $product->description }}</p>
            </div>
        </div>
    </div>
@endsection

@section('before_body_ends')

@endsection