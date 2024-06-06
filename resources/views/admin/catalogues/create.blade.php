@extends('admin.layouts.master')

@section('title')
    Thêm danh mục
@endsection

@section('content')
    <form action="{{ route('admin.catalogues.store') }}" method="POST" enctype="multipart/form-data">
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Tên</label>
            <input type="text" class="form-control" id="email" name="name">
        </div>
        <div class="mb-3">
            <label for="pwd" class="form-label">Ảnh</label>
            <input type="file" class="form-control" id="pwd" name="cover">
        </div>
        <div class="form-check mb-3">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" value="1" name="is_active" checked> Hoạt động
            </label>
        </div>
        @csrf
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
@endsection
