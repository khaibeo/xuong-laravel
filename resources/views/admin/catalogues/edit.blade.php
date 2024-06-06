@extends('admin.layouts.master')

@section('title')
    Sửa danh mục
@endsection

@section('content')
    <form action="{{ route('admin.catalogues.update', $model->id) }}" method="POST" enctype="multipart/form-data">
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Tên</label>
            <input type="text" value="{{ $model->name }}" class="form-control" id="email" name="name">
        </div>
        <div class="mb-3">
            <label for="pwd" class="form-label">Ảnh</label>
            <input type="file" class="form-control" id="pwd" name="cover">
            @if ($model->cover)
                <img width="50" height="50" src="{{ \Storage::url($model->cover) }}" alt="">
            @endif
        </div>
        <div class="form-check mb-3">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" value="1" name="is_active"
                    @if ($model->is_active) checked @endif> Hoạt động
            </label>
        </div>
        @csrf
        @method('PUT')
        <button type="submit" class="btn btn-primary">Sửa</button>
    </form>
@endsection
