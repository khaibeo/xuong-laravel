@extends('admin.layouts.master')

@section('title')
    Danh sách danh mục
@endsection

@section('style-libs')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0">Danh sách sản phẩm</h5>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Thêm mới</a>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">
                        <thead>
                            <tr>
                                {{-- <th scope="col" style="width: 10px;">
                                    <div class="form-check">
                                        <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                    </div>
                                </th> --}}
                                <th data-ordering="false">ID</th>
                                <th data-ordering="false">Ảnh</th>
                                <th data-ordering="false">Tên</th>
                                <th data-ordering="false">Danh mục</th>
                                <th data-ordering="false">SKU</th>
                                <th data-ordering="false">Giá</th>
                                <th data-ordering="false">Giá sale</th>
                                <th>Lượt xem</th>
                                <th>Hoạt động</th>
                                <th>Deal hot</th>
                                <th>Deal tốt</th>
                                <th>Mới</th>
                                <th>Trang chủ</th>
                                <th>Thẻ</th>
                                <th>Thời gian tạo</th>
                                <th>Cập nhật</th>

                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        @php
                                            $url = $item->img_thumbnail;

                                            if (!\Str::contains($item->img_thumbnail, 'http')) {
                                                $url = \Storage::url($item->img_thumbnail);
                                            }
                                        @endphp
                                        <img width="50" height="50" src="{{ $url }}" alt="">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->catalogue->name }}</td>
                                    <td>{{ $item->sku }}</td>
                                    <td>{{ $item->price_regular }}</td>
                                    <td>{{ $item->price_sale }}</td>
                                    <td>{{ $item->views }}</td>
                                    <td>{!! $item->is_active ? '<span class="badge bg-success">OK</span>' : '<span class="badge bg-warning">No</span>' !!}</td>
                                    <td>{!! $item->is_hot_deal ? '<span class="badge bg-success">OK</span>' : '<span class="badge bg-warning">No</span>' !!}</td>
                                    <td>{!! $item->is_good_deal
                                        ? '<span class="badge bg-success">OK</span>'
                                        : '<span class="badge bg-warning">No</span>' !!}</td>
                                    <td>{!! $item->is_new ? '<span class="badge bg-success">OK</span>' : '<span class="badge bg-warning">No</span>' !!}</td>
                                    <td>{!! $item->is_show_home
                                        ? '<span class="badge bg-success">OK</span>'
                                        : '<span class="badge bg-warning">No</span>' !!}</td>
                                    <td>
                                        @foreach ($item->tags as $tag)
                                            <span class="badge bg-info">{{ $tag->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a href="{{ route('admin.products.show', $item->id) }}"
                                                        class="dropdown-item"><i
                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i> Xem</a>
                                                </li>
                                                <li><a href="{{ route('admin.products.edit', $item->id) }}"
                                                        class="dropdown-item edit-item-btn"><i
                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                        Sửa</a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('admin.products.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button class="btn"
                                                            onclick="return confirm('Bạn có chắc là muốn xóa ?')"><i
                                                                class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>Xóa</button>
                                                        @method('DELETE')
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->
@endsection

@section('scripts')
    <script>
        new DataTable("#example", {
            order: [
                [0, 'desc']
            ]
        })
    </script>
@endsection

@section('script-libs')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--datatable js-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
@endsection
