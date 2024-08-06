@extends('admin.index')
@section('list')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">List Categores</h4>
                    <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addRowModal">
                        <i class="fa fa-plus"></i>
                        Add Category
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Modal add -->
                <div class="modal fade" id="addRowModal" tabindex="-1" aria-labelledby="addRowModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <h5 class="modal-title">
                                    <span class="fw-mediumbold">Add</span>
                                    <span class="fw-light"> Categores </span>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="addProductForm" action="{{ route('CateStore') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="productName" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="productName"
                                            placeholder="Enter categores name" name="name">
                                    </div>
                                    <div class="modal-footer border-0">
                                        <button type="submit" class="btn btn-primary" id="saveProductButton">Add</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal edit -->
                <div class="modal fade" id="editRowModal" tabindex="-1" aria-labelledby="editRowModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <h5 class="modal-title">
                                    <span class="fw-mediumbold">Edit</span>
                                    <span class="fw-light"> Category </span>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editcateForm" action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" id="editCateId" name="id">
                                    <div class="mb-3">
                                        <label for="editcateName" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="ediCateName" name="name"
                                            placeholder="Enter category name">
                                    </div>
                                    <div class="modal-footer border-0">
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $c)
                                <tr>
                                    <td>{{ $c->id }}</td>
                                    <td>{{ $c->name }}</td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="#" class="btn btn-link btn-primary btn-lg edit-cate"
                                                data-id="{{ $c->id }}" data-bs-toggle="modal"
                                                data-bs-target="#editRowModal">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('CateDestroy', $c->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh muc này?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link btn-danger" data-bs-toggle="tooltip" title="Remove">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <!-- Các hàng khác -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).on('click', '.edit-cate', function() {
            var cateId = $(this).data('id');
            $.ajax({
                url: '/Category/' + cateId,
                method: 'GET',
                success: function(data) {
                    console.log(data); // Xem dữ liệu trả về từ server

                    // Cập nhật action của form
                    $('#editcateForm').attr('action', '/Category/' + data.id);

                    // Điền dữ liệu vào các trường của form
                    $('#editCateId').val(data.id);
                    $('#ediCateName').val(data.name);
                    // Hiển thị modal chỉnh sửa
                    $('#editRowModal').modal('show');
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    </script>
@endsection
