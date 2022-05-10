<form method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
        <input type="text" name="name" class="form-control"
            value="{{ isset($category->name) ? $category->name : '' }}" id="exampleInputEmail1"
            placeholder="Tên danh mục">
        @if ($errors->has('name'))
            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Image</label>
        <input type="file" name="image" class="form-control" id="exampleInputPassword1" placeholder="Image">
    </div>
    @if (isset($category))
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    @else
        <button type="submit" class="btn btn-primary">Thêm mới</button>
    @endif
</form>
