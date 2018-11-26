@extends('admin.layouts.app')

@section('content')
    <form method="POST" action="{{ route('admin.product.store') }}">
        {{ csrf_field() }}
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2 class="h2">Create Product</h2>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button class="btn btn-sm btn-outline-danger">Cancel</button>
                </div>
            </div>
        </div>
        <div class="table-responsive">

            <div class="form-group">
                <label for="product_name">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="product_name">
            </div>
            <div class="form-group">
                <label for="product_sku">SKU</label>
                <input type="text" name="sku" value="{{ old('sku') }}" class="form-control" id="product_sku">
            </div>
            <div class="form-group">
                <label for="product_price">Price</label>
                <input type="text" name="price" value="{{ old('price') }}" class="form-control" id="product_price">
            </div>
            <div class="form-group">
                <label for="product_description">Description</label>
                <textarea name="description" id="product_description" class="form-control" rows="3">{{ old('description') }}</textarea>
            </div>
            <div class="checkbox">
                <label>
                    <input name="active" value="{{ old('active') }}" type="checkbox"> Active
                </label>
            </div>
        </div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button type="submit" class="btn btn-sm btn-outline-primary">Save Product</button>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('before_body_ends')

@endsection