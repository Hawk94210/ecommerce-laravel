@extends('admin.master')
@section('content')
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('show.admin') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh mục</li>
        </ol>
    </nav>
    {!! Toastr::message() !!}
    <h3>Quản lý danh mục <a href="{{ route('create.category') }}" class="float-end" style="font-size: 25px"><i
                class="fa-solid fa-file-circle-plus"></i> Thêm mới</a></h3>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Ảnh</th>
                <th scope="col" style="text-align: center">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @if ($categories)
                @foreach ($categories as $key => $category)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td><img src="/uploads/categories/{{ $category->image }}" height="75px" width="100px"></td>
                        <td style="text-align: center">
                            <a style="padding: 5px 10px;border: 1px solid #999; font-size: 12px"
                                href="{{ route('edit.category', $category->id) }}" class="btn btn-warning"><i
                                    class="fa-solid fa-pen-to-square" style="font-size: 11px"></i> Cập
                                nhật</a>
                            <a style="padding: 5px 10px;border: 1px solid #999; font-size: 12px"
                                href="{{ route('action.category', ['delete', $category->id]) }}" class="btn btn-danger"><i
                                    class="fa-solid fa-trash-can" style="font-size: 11px"></i> Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
