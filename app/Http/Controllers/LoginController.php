<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   public function Login(){
    return view('admin.login');
   }

   public function Register(){
    return view('admin.register');
   }
 
  
   public function PostRegister(Request $request){
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
    
    return redirect()->route('login')->with('message', 'Đăng kí thành công');
   }

   public function PostLogin(Request $request)
   {
       $credentials = $request->only(['username', 'password']);
   
       // Đổi 'username' thành tên cột thực tế trong cơ sở dữ liệu của bạn nếu cần
       if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password'], 'active' => 1, 'role' => 'user'])) {
           // Nếu đăng nhập thành công, chuyển hướng đến trang chi tiết người dùng
           return redirect()->route('product.index');
       }elseif(Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password'], 'active' => 1, 'role' => 'admin'])){
        return redirect()->route('dashboardPro');
       } 
       else {
           // Nếu đăng nhập thất bại, quay lại trang trước và hiển thị thông báo lỗi
           return redirect()->back()->with('error', 'Username hoặc Password không chính xác hoặc tài khoản chưa được kích hoạt.');
       }
   }
   

   public function logout(){
    Auth::logout();
    return redirect()->route('login');
   }

}
