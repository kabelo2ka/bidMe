@extends('admin.layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Products</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{ route('admin.product.create') }}" class="btn btn-success">Add Product</a>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th width="10">ID</th>
                <th>Name</th>
                <th>Views</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                        {{--<img src="{{ $product->image_url }}" width="48px" alt="">--}}
                        <a href="{{ route('admin.product.show', ['product' => $product->id]) }}"><strong
                                    class="ml-2">{{ $product->name }}</strong></a>
                    </td>
                    <td>{{ $product->views }}</td>
                    <td>{{ $product->active ? 'Active' :  'Not Active' }}</td>
                    <td>

                        <div class="btn-group dropup">
                            <a href="{{ route('admin.product.show', ['product' => $product->id]) }}"
                               class="btn btn-sm btn-outline-primary">View</a>
                            <button type="button"
                                    class="btn btn-sm btn-outline-primary dropdown-toggle dropdown-toggle-split"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a href="{{ route('admin.product.edit', ['product' => $product->id]) }}"
                                   class="dropdown-item">Edit</a>
                                <a href="{{ route('admin.product.destroy', ['product' => $product->id]) }}"
                                   data-method="DELETE" data-confirm="Are you sure?"
                                        class="dropdown-item">Delete
                                </a>
                            </div>
                        </div>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="float-right">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection

@section('before_body_ends')
    <script>
        $(function () {

        });
    </script>
@endsection