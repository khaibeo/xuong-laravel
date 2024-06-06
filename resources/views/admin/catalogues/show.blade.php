@extends('admin.layouts.master')

@section('title')
    Thông tin danh mục
@endsection

@section('content')
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Tên</label>
            <input disabled type="text" value="{{ $model->name }}" class="form-control" id="email" name="name">
        </div>
        <div class="mb-3">
            @if ($model->cover)
                <img width="50" height="50" src="{{ \Storage::url($model->cover) }}" alt="">
            @endif
        </div>
        <div class="form-check mb-3">
            <label class="form-check-label">
                <input disabled class="form-check-input" type="checkbox" value="1" name="is_active"
                    @if ($model->is_active) checked @endif> Hoạt động
            </label>
        </div>
        <div class="mb-3">
            Thời gian tạo: {{ $model->created_at }}
        </div>
        <div class="mb-3">
            Thời gian cập nhật: {{ $model->updated_at }}
        </div>
        {{-- @csrf
        @method('PUT') --}}
        {{-- <button type="submit" class="btn btn-primary">Sửa</button> --}}
    </form>
@endsection
