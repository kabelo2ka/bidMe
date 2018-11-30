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
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Edit "{{ $product->name }}"</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a class="btn btn-outline-danger" href="{{ route('admin.product.index') }}">Cancel</a>
            </div>
        </div>
    </div>
    <form method="POST" action="{{ route('admin.product.update', ['product' => $product->id]) }}">
        @csrf
        @method('PATCH')
        @include('admin.product.form')
    </form>
@endsection

@section('before_body_ends')

@endsection