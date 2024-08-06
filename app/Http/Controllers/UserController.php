<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function GetAllUser(Request $request)
    {
        $query = $request->input('query');
        $currentUserId = Auth::id(); // Lấy ID của người dùng hiện tại
    
        if ($query) {
            // Tìm kiếm người dùng theo tên nhưng loại trừ người dùng hiện tại
            $users = User::where('fullname', 'like', "%{$query}%")
                ->where('id', '!=', $currentUserId)
                ->get();
        } else {
            // Lấy tất cả người dùng nhưng loại trừ người dùng hiện tại
            $users = User::where('id', '!=', $currentUserId)->get();
        }
    
        return view('admin.user.listuser', compact('users'));
    }
    
    public function store(Request $request){
        $data = $request->except('avatar');
    
        $data['avatar'] = "";
        if ($request->hasFile('avatar')) {
            //upload file
            $path_img = $request->file('avatar')->store('images');
            $data['avatar'] = $path_img;
        }
        //create data 
        User::query()->create($data);
        //quay lai trang list
        
        return redirect()->route('Userlist')->with('message', 'Thêm User thành công');
       }

         //edit user
    public function edit($id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }

      //update
      public function update(Request $request, $id)
      {
          // Tìm sản phẩm theo ID
          $user = User::findOrFail($id);
  
          // Lấy dữ liệu từ request, loại bỏ hình ảnh để xử lý riêng
          $data = $request->except('images');
  
          // Lưu giữ hình ảnh cũ
          $old_img = $user->images;
  
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
          $user->update($data);
  
          // Quay lại trang danh sách với thông báo thành công
          return redirect()->back()->with('message', 'Cập nhật dữ liệu thành công');
      }

      public function destroy($id)
      {
          // Tìm người dùng theo ID
          $user = User::findOrFail($id);
      
          // Xóa hình ảnh nếu có
          if ($user->avatar && file_exists(storage_path('app/public/' . $user->avatar))) {
              unlink(storage_path('app/public/' . $user->avatar));
          }
          // Xóa người dùng
          $user->delete();
          // Trả về thông báo thành công
          return redirect()->back()->with('message', 'User đã được xóa thành công');
      }

      public function toggleActive($id, Request $request)
{
    $user = User::findOrFail($id);
    $user->active = $request->input('active');
    $user->save();

    return response()->json(['success' => true]);
}
      

}
