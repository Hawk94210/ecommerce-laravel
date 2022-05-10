<form method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-8">
            <div class="mb-3">
                <label class="form-label">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control"
                    value="{{ isset($product->name) ? $product->name : '' }}" placeholder="Tên sản phẩm">
                @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <textarea name="description" class="form-control" id="" cols="20" placeholder="Mô tả ngắn sản phẩm"
                    rows="5">{{ isset($product->description) ? $product->description : '' }}</textarea>
                @if ($errors->has('description'))
                    <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Content</label>
                <input type="text" name="content" class="form-control"
                    value="{{ isset($product->content) ? $product->content : '' }}" placeholder="Content">
                @if ($errors->has('content'))
                    <span class="text-danger text-left">{{ $errors->first('content') }}</span>
                @endif
            </div>
        </div>
        <div class="col-sm-4">
            <div class="mb-3">
                <label class="form-label">Loại sản phẩm</label>
                <select name="pro_category_id" id="" class="form-select">
                    <option value="">--Chọn loại sản phẩm--</option>
                    @if (isset($categories))
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('pro_category_id', isset($product->pro_category_id) ? $product->pro_category_id : '') == $category->id ? "selected='selected'" : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Giá sản phẩm</label>
                <input type="text" name="price" class="form-control"
                    value="{{ isset($product->price) ? $product->price : '' }}" placeholder="Giá sản phẩm">
                @if ($errors->has('price'))
                    <span class="text-danger text-left">{{ $errors->first('price') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Khuyến mãi</label>
                <input type="text" name="sale" class="form-control"
                    value="{{ isset($product->sale) ? $product->sale : '0' }}" placeholder="%">
                @if ($errors->has('sale'))
                    <span class="text-danger text-left">{{ $errors->first('sale') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control" placeholder="Image">
            </div>
        </div>
    </div>
    @if (isset($product))
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    @else
        <button type="submit" class="btn btn-primary">Thêm mới</button>
    @endif
</form>
