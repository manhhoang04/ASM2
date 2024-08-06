@extends('admin.index')
@section('list')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title" style="margin-right: 80px">List User</h4>
                    <form action="{{ route('Userlist') }}" method="GET">
                        @csrf
                    <nav
                    class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex"
                  >
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <button type="submit" class="btn btn-search pe-1">
                          <i class="fa fa-search search-icon"></i>
                        </button>
                      </div>
                      <input
                        type="text"
                        name="query"
                        placeholder="Search ..."
                        class="form-control"
                      />
                    </div>
                  </nav>
                </form>
                    <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addRowModal">
                        <i class="fa fa-plus"></i>
                        Add User
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
                                    <span class="fw-light"> User </span>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="adduserForm" action="{{ route('userstore') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="productName" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="userName"
                                            placeholder="Enter user full name" name="fullname" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="productImage" class="form-label">Avarta</label>
                                        <input type="file" class="form-control" id="userImage" name="avatar" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="productPrice" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="useremail"
                                            placeholder="Enter user email" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="productPrice" class="form-label">User Name</label>
                                        <input type="text" class="form-control" id="productPrice"
                                            placeholder="Enter user name" name="username" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="productPrice" class="form-label">PassWord</label>
                                        <input type="text" class="form-control" id="Userpassword"
                                            placeholder="Enter user password" name="password" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="productDescription" class="form-label">Address</label>
                                        <textarea class="form-control" name="adress" id="userAddress" rows="3" placeholder="Enter user address" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="productPrice" class="form-label">Birth Day</label>
                                        <input type="text" class="form-control" id="userBirthday"
                                            placeholder="Enter user bith day" name="birthday" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="productPrice" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" id="userPhone"
                                            placeholder="Enter user bith day" name="sdt" required>
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
                <!-- Modal edit -->
                <div class="modal fade" id="editRowModal" tabindex="-1" aria-labelledby="editRowModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <h5 class="modal-title">
                                    <span class="fw-mediumbold">Edit</span>
                                    <span class="fw-light"> User </span>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editUserForm" action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" id="editUserId" name="id">
                                    <div class="mb-3">
                                        <label for="editProductName" class="form-label">Full name</label>
                                        <input type="text" class="form-control" id="editFullName" name="fullname"
                                            placeholder="Enter user full name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editProductName" class="form-label">User name</label>
                                        <input type="text" class="form-control" id="editUserName" name="username"
                                            placeholder="Enter user name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editProductImage" class="form-label">Avatar</label>
                                        <input type="file" class="form-control" id="editUserImage" name="avatar">
                                        <img id="currentUserImage" src="" alt="Current Product Image"
                                            width="60" class="mt-2" style="display: none;">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editProductPrice" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="edituserEmail" name="email"
                                            placeholder="Enter user email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editProductPrice" class="form-label">Birth Day</label>
                                        <input type="string" class="form-control" id="edituserBirthday" name="birthday"
                                            placeholder="Enter user  birth day">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editProductPrice" class="form-label">Phone Number</label>
                                        <input type="number" class="form-control" id="edituserphone" name="sdt"
                                            placeholder="Enter user phone number">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editProductDescription" class="form-label">Address</label>
                                        <textarea class="form-control" id="editUserAddress" name="adress" rows="3" placeholder="Enter user adress"></textarea>
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
                                <th>Avatar</th>
                                <th>Full name</th>
                                <th>Email</th>
                                <th>Birth day</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Active</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $u)
                                <tr>
                                    <td><img src="{{ asset('/storage/' . $u->avatar) }}" width="60" alt="">
                                    </td>
                                    <td>{{ $u->fullname }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>{{ $u->birthday }}</td>
                                    <td>{{ $u->adress }}</td>
                                    <td>{{ $u->sdt }}</td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input" data-id="{{ $u->id }}"
                                                {{ $u->active ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="#" class="btn btn-link btn-primary btn-lg edit-user"
                                                data-id="{{ $u->id }}" data-bs-toggle="modal"
                                                data-bs-target="#editRowModal">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('userDestroy', $u->id) }}" method="POST"
                                                style="display:inline;"
                                                onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link btn-danger"
                                                    data-bs-toggle="tooltip" title="Remove">
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
        $(document).on('click', '.edit-user', function() {
            var userId = $(this).data('id');
            $.ajax({
                url: '/user/' + userId,
                method: 'GET',
                success: function(data) {
                    console.log(data); // Xem dữ liệu trả về từ server

                    // Cập nhật action của form
                    $('#editUserForm').attr('action', '/user/' + data.id);

                    // Điền dữ liệu vào các trường của form
                    $('#editUserId').val(data.id);
                    $('#editFullName').val(data.fullname);
                    $('#editUserName').val(data.username);
                    $('#edituserEmail').val(data.email);
                    $('#edituserBirthday').val(data.birthday);
                    $('#edituserphone').val(data.sdt);
                    $('#editUserAddress').val(data.adress);
                    // Hiển thị ảnh hiện tại
                    if (data.avatar) {
                        $('#currentUserImage').attr('src', '/storage/' + data.avatar).show();
                    } else {
                        $('#currentUserImage').hide();
                    }

                    // Hiển thị modal chỉnh sửa
                    $('#editRowModal').modal('show');
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });

        $(document).on('change', '.form-check-input', function() {
    var userId = $(this).data('id');
    var active = $(this).is(':checked') ? 1 : 0;

    $.ajax({
        url: '/user/toggle-active/' + userId,
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            active: active
        },
        success: function(response) {
            if (response.success) {
                alert('Trạng thái của người dùng đã được cập nhật.');
            } else {
                alert('Có lỗi xảy ra, vui lòng thử lại.');
            }
        },
        error: function(xhr) {
            console.log(xhr.responseText);
            alert('Có lỗi xảy ra, vui lòng thử lại.');
        }
    });
});

    </script>
@endsection
