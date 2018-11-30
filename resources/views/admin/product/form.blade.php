<div class="table-responsive">
    <input type="hidden" name="image_url" value="temporary">
    <div class="form-group">
        <label for="product_name">Name</label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control" id="product_name">
    </div>
    <div class="form-group">
        <label for="product_sku">SKU</label>
        <input type="text" name="sku" value="{{ old('sku', $product->sku) }}" class="form-control" id="product_sku">
    </div>
    <div class="form-group">
        <label for="product_price">Price</label>
        <input type="text" name="price" value="{{ old('price', $product->price) }}" class="form-control" id="product_price"
               data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': 'R ', 'placeholder': '0'">
    </div>
    <div class="form-group">
        <label for="product_description">Description</label>
        <textarea name="description" id="product_description" class="form-control"
                  rows="3">{{ old('description', $product->description) }}</textarea>
    </div>
    <div class="checkbox">
        <label>
            <input name="active" value="active" {{ old('active', $product->active) ? 'checked':'' }} type="checkbox"> Active
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