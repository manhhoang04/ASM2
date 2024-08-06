@extends('admin.index')
@section('list')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    
                    <h4 class="card-title" style="margin-right: 80px">List Product</h4>
                    <form action="{{ route('prolist') }}" method="GET">
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
                        Add Product
                    </button>
                    
                </div>
                
            </div>
            <div class="card-body">
                <!-- Modal add -->
                <div class="modal fade" id="addRowModal" tabindex="-1" aria-labelledby="addRowModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <h5 class="modal-title">
                                    <span class="fw-mediumbold">Add</span>
                                    <span class="fw-light"> Product </span>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="addProductForm" action="{{ route('pro.store') }}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                    <div class="mb-3">
                                        <label for="productName" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="productName" placeholder="Enter product name" name="name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="productImage" class="form-label">Image</label>
                                        <input type="file" class="form-control" id="productImage" name="images">
                                    </div>
                                    <div class="mb-3">
                                        <label for="productPrice" class="form-label">Price</label>
                                        <input type="number" class="form-control" id="productPrice" placeholder="Enter product price" name="price">
                                    </div>
                                    <div class="mb-3">
                                        <label for="productDescription" class="form-label">Description</label>
                                        <textarea  class="form-control" name="description" id="productDescription" rows="3" placeholder="Enter product description"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="productCategory" class="form-label">Category</label>
                                        <select class="form-select" id="productCategory" name="category_id">
                                          <option value="">Select category</option>
                                          @foreach ( $category as $c )
                                          <option value="{{$c->id}}">{{$c->name}}</option>
                                          @endforeach
                                            
                                            
                                         
                                        </select>
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
<div class="modal fade" id="editRowModal" tabindex="-1" aria-labelledby="editRowModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header border-0">
              <h5 class="modal-title">
                  <span class="fw-mediumbold">Edit</span>
                  <span class="fw-light"> Product </span>
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form id="editProductForm" action="" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <input type="hidden" id="editProductId" name="id">
                  <div class="mb-3">
                      <label for="editProductName" class="form-label">Name</label>
                      <input type="text" class="form-control" id="editProductName" name="name" placeholder="Enter product name">
                  </div>
                  <div class="mb-3">
                      <label for="editProductImage" class="form-label">Image</label>
                      <input type="file" class="form-control" id="editProductImage" name="images">
                      <img id="currentProductImage" src="" alt="Current Product Image" width="100" class="mt-2" style="display: none;">
                  </div>
                  <div class="mb-3">
                      <label for="editProductPrice" class="form-label">Price</label>
                      <input type="number" class="form-control" id="editProductPrice" name="price" placeholder="Enter product price">
                  </div>
                  <div class="mb-3">
                      <label for="editProductDescription" class="form-label">Description</label>
                      <textarea class="form-control" id="editProductDescription" name="description" rows="3" placeholder="Enter product description"></textarea>
                  </div>
                  <div class="mb-3">
                      <label for="editProductCategory" class="form-label">Category</label>
                      <select class="form-select" id="editProductCategory" name="category_id">
                          <option value="">Select category</option>
                          @foreach ($category as $c)
                              <option value="{{$c->id}}">{{$c->name}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="modal-footer border-0">
                      <button type="submit" class="btn btn-primary">Save changes</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                                <th>Images</th>
                                <th>Price</th>
                                <th>View</th>
                                <th>Category</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach (  $products as $p)
                            <tr>
                             
                                
                         
                                <td>{{$p->id}}</td>
                                <td>{{$p->name}}</td>
                                <td><img src="{{asset('/storage/'.$p->images) }}" width="60" alt=""></td>
                                <td>{{$p->price}}</td>
                                <td>{{$p->View}}</td>
                                <td>{{$p->Category->name}}</td>
                                <td>
                                    <div class="form-button-action">
                                      <a href="#" class="btn btn-link btn-primary btn-lg edit-product" data-id="{{ $p->id }}" data-bs-toggle="modal" data-bs-target="#editRowModal">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('pro.destroy', $p->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
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
     $(document).on('click', '.edit-product', function() {
    var productId = $(this).data('id');
    $.ajax({
        url: '/product/' + productId,
        method: 'GET',
        success: function(data) {
            console.log(data); // Xem dữ liệu trả về từ server

            // Cập nhật action của form
            $('#editProductForm').attr('action', '/edit/' + data.id);

            // Điền dữ liệu vào các trường của form
            $('#editProductId').val(data.id);
            $('#editProductName').val(data.name);
            $('#editProductPrice').val(data.price);
            $('#editProductDescription').val(data.description);
            $('#editProductCategory').val(data.category_id);

            // Hiển thị ảnh hiện tại
            if (data.images) {
                $('#currentProductImage').attr('src', '/storage/' + data.images).show();
            } else {
                $('#currentProductImage').hide();
            }
            
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
