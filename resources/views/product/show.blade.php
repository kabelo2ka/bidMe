@extends('admin.layouts.app')

@section('content')
    <div class="d-flex">
        <div><img src="{{ $product->image_url }}" alt=""></div>
        <div>
            <h1>{{ $product->name }}</h1>
            <div><strong>Highest Bid:</strong> {{ $product->getHighestBid()->amount }}</div>
            <div><strong>Average Bid:</strong> {{ $product->getAverageBid()->amount }}</div>
            <div><strong>Your Bid:</strong> {{ $product->getBidByUserId(auth()->id())->amount }}</div>

            <div>
                <h3>Place bid:</h3>
                <div>
                    <form method="POST" action="">
                        <input type="email" name="email" placeholder="email">
                        <input type="text" name="price" placeholder="price">
                        <button type="submit">Place bid</button>
                    </form>
                </div>
            </div>

            <p>{{ $product->description }}</p>
        </div>
    </div>
@endsection

@section('before_body_ends')

@endsection