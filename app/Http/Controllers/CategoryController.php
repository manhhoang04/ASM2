<?php

namespace App\Http\Controllers;

use App\Models\cliend\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function GetAllCate()
    {
        $category = Category::orderBy('id', 'desc')->get();
        return view('admin.category.listcate', compact('category'));
    }

    //add
    public function store(Request $request)
    {
        // Lấy toàn bộ dữ liệu từ request
        $data = $request->all();
        Category::query()->create($data);
        return redirect()->route('catelist')->with('message', 'Thêm sản phẩm thành công');
    }

    public function edit($id)
{
    $cate = Category::find($id);
    if ($cate) {
        return response()->json($cate);
    } else {
        return response()->json(['error' => 'Product not found'], 404);
    }
}

 //update
 public function update(Request $request, $id)
 {
     // Tìm sản phẩm theo ID
     $cate = Category::findOrFail($id);
    $data = $request->all();
     // Cập nhật dữ liệu sản phẩm
     $cate->update($data);
     // Quay lại trang danh sách với thông báo thành công
     return redirect()->back()->with('message', 'Cập nhật dữ liệu thành công');
 }

 public function destroy($id)
 {
     // Tìm sản phẩm theo ID
     $product = Category::findOrFail($id);

     // Xóa sản phẩm
     $product->delete();

     // Trả về thông báo thành công
     return redirect()->back()->with('message', 'Sản phẩm đã được xóa thành công');
 }
}
