@extends('admin.layouts.master')

@section('title')
    Thêm sản phẩm
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Thêm mới</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Sản phẩm</a></li>
                        <li class="breadcrumb-item active">Thêm mới</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Thông tin sản phẩm</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                            <div class="row gy-4">
                                <div class="col-md-4">
                                    <div>
                                        <label for="name" class="form-label">Tên sản phẩm</label>
                                        <input type="text" class="form-control" name="name" id="name">
                                    </div>

                                    <div class="mt-3">
                                        <label for="sku" class="form-label">SKU</label>
                                        <input type="text" class="form-control" name="sku" id="sku">
                                    </div>

                                    <div class="mt-3">
                                        <label for="price_regular" class="form-label">Giá thường</label>
                                        <input type="text" class="form-control" name="price_regular" id="price_regular">
                                    </div>

                                    <div class="mt-3">
                                        <label for="price_sale" class="form-label">Giá sale</label>
                                        <input type="text" class="form-control" name="price_sale" id="price_sale">
                                    </div>

                                    <div class="mt-3">
                                        <label for="basiInput" class="form-label">Danh mục</label>
                                        <select name="catalogue_id" class="form-select" id="">
                                            @foreach ($catalogues as $key => $item)
                                                <option value="{{ $key }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-3">
                                        <label for="img_thumbnail" class="form-label">Ảnh đại diện</label>
                                        <input type="file" class="form-control" name="img_thumbnail" id="img_thumbnail">
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="mb-3 d-flex justify-content-between">
                                        <div class="form-check form-switch form-switch-custom form-switch-primary">
                                            <input class="form-check-input" type="checkbox" name="is_active" role="switch"
                                                id="is_active" checked>
                                            <label class="form-check-label" for="is_active">Hoạt động</label>
                                        </div>

                                        <div class="form-check form-switch form-switch-custom form-switch-secondary">
                                            <input class="form-check-input" type="checkbox" name="is_hot_deal"
                                                role="switch" id="is_hot_deal" checked>
                                            <label class="form-check-label" for="is_hot_deal">Deal hot</label>
                                        </div>

                                        <div class="form-check form-switch form-switch-custom form-switch-success">
                                            <input class="form-check-input" type="checkbox" name="is_good_deal"
                                                role="switch" id="is_good_deal" checked>
                                            <label class="form-check-label" for="is_good_deal">Deal tốt</label>
                                        </div>

                                        <div class="form-check form-switch form-switch-custom form-switch-warning">
                                            <input class="form-check-input" type="checkbox" name="is_new" role="switch"
                                                id="is_new" checked>
                                            <label class="form-check-label" for="is_new">Mới</label>
                                        </div>

                                        <div class="form-check form-switch form-switch-custom form-switch-danger">
                                            <input class="form-check-input" type="checkbox" name="is_show_home"
                                                role="switch" id="is_show_home" checked>
                                            <label class="form-check-label" for="is_show_home">Hiển thị trang chủ</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Mô tả ngắn</label>
                                        <textarea class="form-control" name="description" id="description" rows="2"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="material" class="form-label">Chất liệu</label>
                                        <textarea class="form-control" name="material" id="material" rows="2"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="user_manual" class="form-label">Hướng dẫn sử dụng</label>
                                        <textarea class="form-control" name="user_manual" id="user_manual" rows="2"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="content" class="form-label">Mô tả sản phẩm</label>
                                        <textarea class="form-control" name="content" id="content" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--end row-->
                </div>
            </div>

            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Biến thể</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row gy-4" style="height: 300px; overflow:scroll">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Size</th>
                                        <th>Màu</th>
                                        <th>Số lượng</th>
                                        <th>Ảnh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sizes as $sizeId => $size)
                                        @foreach ($colors as $colorId => $color)
                                            <tr>
                                                <td>{{ $size }}</td>
                                                <td>
                                                    <div
                                                        style="width: 30px; height: 30px; background: {{ $color }}">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text"
                                                        name="product_variants[{{ $sizeId . '-' . $colorId }}][quantity]"
                                                        class="form-control">
                                                </td>
                                                <td>
                                                    <input type="file"
                                                        name="product_variants[{{ $sizeId . '-' . $colorId }}][image]"
                                                        class="form-control">
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
    </div>
    <!--end col-->
    </div>
@endsection

@section('script-libs')
    <script src="https:////cdn.ckeditor.com/4.8.0/basic/ckeditor.js"></script>
@endsection

@section('scripts')
    <script>
        CKEDITOR.replace('content')
    </script>
@endsection
