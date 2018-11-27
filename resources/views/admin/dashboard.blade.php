@extends('admin.layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div>
    </div>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Products</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{ route('admin.product.create') }}" class="btn btn-sm btn-outline-primary">Add Product</a>
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
                <th width="10px">#</th>
                <th>Name</th>
                <th>Views</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td width="10px">{{ $product->id }}</td>
                    <td>
                        <img src="{{ $product->image_url }}" width="48px" alt="">
                        <strong>{{ $product->name }}</strong>
                    </td>
                    <td>{{ $product->views }}</td>
                    <td>{{ $product->active ? 'Active' :  'Not Active' }}</td>
                    <td><a href="#" class="btn btn-sm btn-outline-primary">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('before_body_ends')

@endsection