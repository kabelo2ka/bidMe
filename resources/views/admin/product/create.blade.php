@extends('admin.layouts.app')

@section('content')
    @if($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Create a new product</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a class="btn btn-outline-danger" href="{{ route('admin.product.index') }}">Cancel</a>
            </div>
        </div>
    </div>
    <form method="POST" action="{{ route('admin.product.store') }}">
        @csrf
        @include('admin.product.form', ['product' => new \App\Product()])
    </form>
@endsection

@section('before_body_ends')

@endsection