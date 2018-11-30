@extends('admin.layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif
    <div class="btn-toolbar mb-2 mb-md-0 clearfix">
        <div class="btn-group mr-2">
            <a href="{{ route('admin.product.edit', ['product' => $product->id]) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('admin.product.destroy', ['product' => $product->id]) }}" class="btn btn-danger" data-method="DELETE" data-confirm="Are you sure?">Delete</a>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-5">
            <img class="img-fluid"
                 data-src="holder.js/540px400?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail"
                 alt="{{ $product->name }}">
            {{--<img class="img-fluid" src="{{ $product->image_url }}" alt="{{ $product->name }}">--}}
        </div>
        <div class="col-md-7">
            <h1 class="mt-sm-4">{{ $product->name }}</h1>
            <div class="bid-details mt-5">
                <table class="table table-striped table-lg">
                    <tr>
                        <td>View Count:</td>
                        <td>{{ $product->views }}</td>
                    </tr>
                    <tr>
                        <td>Highest Bid:</td>
                        <td>R {{ $product->getHighestBidAmount() }}</td>
                    </tr>
                    <tr>
                        <td>Lowest Bid:</td>
                        <td>R {{ $product->getLowestBidAmount() }}</td>
                    </tr>
                    <tr>
                        <td>Average Bid:</td>
                        <td>R {{ $product->getAverageBidAmount() }}</td>
                    </tr>
                </table>

            </div>

            {{--<p>{{ $product->description }}</p>--}}
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <h2>Bids ({{ $product->bids->count() }})</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th width="30">#</th>
                        <th>Email</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i = 0)
                    @foreach($product->bids as $bid)
                        @php($i++)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $bid->email }}</td>
                            <td>R{{ $bid->amount }}</td>
                            <td>{{ $bid->updated_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('before_body_ends')

@endsection