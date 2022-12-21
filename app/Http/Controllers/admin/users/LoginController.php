<?php

namespace App\Http\Controllers\admin\users;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.users.login',['title' => 'Đăng Nhập nè']);
    }
    public function store(Request $req)
    {
       $this->validate($req,[
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);
        if (Auth::attempt([
            'email' => $req->input('email'), 
            'password' => $req->input('password')
        ],
        $req->input('remember'))){
            return redirect()->route('admin')->with('success','Đăng nhập thành công');
        }else{
            return redirect()->back()->with('error','Email hoặc mật khẩu không chính xác');
        }
        
    
        
    }
    
}
