<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\cliend\Category as CliendCategory;
use App\Models\cliend\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function listProducts()
    {

        $products1 = Product::orderbyDesc('id')
            ->join('categories', 'Category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as namecate')
            ->take(4)
            ->get();

        $products2 = Product::orderbyDesc('view')
            ->join('categories', 'Category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as namecate')
            ->take(4)
            ->get();
        return view('cliend.home', compact('products1', 'products2'));
    }

    public function DetailProduct($id)
    {
        $product = Product::query()
            ->join('categories', 'Category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as namecate')
            ->where('products.id', '=', $id)->first();

        $product3 = Product::orderbyDesc('view')->get();
        return view('cliend.detail', compact('product', 'product3'));
    }

    public function GetAll()
    {
        $products = Product::all();
        return view('cliend.listPro', compact('products'));
    }

  

    //admin product
    public function GetAllForAdmin(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            // Tìm kiếm sản phẩm theo tên
            $products = Product::where('name', 'like', "{$query}%")->get();
        } else {
            // Lấy tất cả sản phẩm
            $products = Product::all();
        }

        // Lấy danh mục để sử dụng trong form
        $category = CliendCategory::all();

        return view('admin.product.listProducts', compact('products', 'category'));
    }
    //add
    public function store(Request $request)
    {

        // dd($request->all());
        $data = $request->except('images');
        $data['View'] = $request->input('View', 0);
        $data['images'] = "";
        if ($request->hasFile('images')) {
            //upload file
            $path_img = $request->file('images')->store('images');
            $data['images'] = $path_img;
        }
        //create data 
        Product::query()->create($data);
        //quay lai trang list
        return redirect()->route('prolist')->with('message', 'Thêm sản phẩm thành công');
    }

    //edit product
    public function edit($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json($product);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }
    //update
    public function update(Request $request, $id)
    {
        // Tìm sản phẩm theo ID
        $pro = Product::findOrFail($id);

        // Lấy dữ liệu từ request, loại bỏ hình ảnh để xử lý riêng
        $data = $request->except('images');

        // Lưu giữ hình ảnh cũ
        $old_img = $pro->images;

        // Kiểm tra xem có hình ảnh mới không
        if ($request->hasFile('images')) {
            // Xóa hình ảnh cũ nếu tồn tại
            if ($old_img && file_exists(storage_path('storage/' . $old_img))) {
                unlink(storage_path('storage/' . $old_img));
            }

            // Upload hình ảnh mới
            $path_img = $request->file('images')->store('images', 'public');
            $data['images'] = $path_img;
        } else {
            // Nếu không có hình ảnh mới, giữ hình ảnh cũ
            $data['images'] = $old_img;
        }

        // Cập nhật dữ liệu sản phẩm
        $pro->update($data);

        // Quay lại trang danh sách với thông báo thành công
        return redirect()->back()->with('message', 'Cập nhật dữ liệu thành công');
    }

    public function destroy($id)
    {
        // Tìm sản phẩm theo ID
        $product = Product::findOrFail($id);

        // Xóa hình ảnh nếu có
        if ($product->images && file_exists(storage_path('storage/app/public/' . $product->images))) {
            unlink(storage_path('storage/app/public/' . $product->images));
        }

        // Xóa sản phẩm
        $product->delete();

        // Trả về thông báo thành công
        return redirect()->back()->with('message', 'Sản phẩm đã được xóa thành công');
    }

    //total
    public function dashboardPro()
    {
        // Tính tổng số sản phẩm
        $totalProducts = Product::count();
        $totalCategory = CliendCategory::count();
        $totalUser = User::count();
        //
        $categories = CliendCategory::withCount('products')->get();
        $categoryNames = $categories->pluck('name');
        $productCounts = $categories->pluck('products_count');
        return view('admin.home', compact('totalProducts','totalCategory','totalUser','categoryNames','productCounts'));
    }
}
