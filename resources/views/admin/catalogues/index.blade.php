@extends('admin.layouts.master')

@section('title')
    Danh sách danh mục
@endsection

@section('content')
    <a href="{{ route('admin.catalogues.create') }}" class="btn btn-primary">Thêm mới</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Ảnh</th>
                <th>Hoạt động</th>
                <th>Tạo</th>
                <th>Sửa</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td><img width="50" height="50" src="{{ \Storage::url($item->cover) }}" alt=""></td>
                    <td>{!! $item->is_active ? '<span class="badge bg-success">OK</span>' : '<span class="badge bg-warning">No</span>' !!}
                    </td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.catalogues.show', $item->id) }}" class="btn btn-primary">Xem</a>
                        <a href="{{ route('admin.catalogues.edit', $item->id) }}" class="btn btn-warning">Sửa</a>
                        <a onclick="return confirm('Bạn có chắc là muốn xóa ?')"
                            href="{{ route('admin.catalogues.destroy', $item->id) }}" class="btn btn-danger">Xóa</a>

                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $data->links() }}
@endsection
