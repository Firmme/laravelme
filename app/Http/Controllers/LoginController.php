<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //登录页面
    public function index()
    {
        return view('login.index');
    }
    //登录行为
    public function login()
    {
        //三步
        $this->validate(request(),[
            'email'=>'required|email',
            'password'=>'required|min:6|max:16',
            'is_remember'=>'integer'
        ]);
        $user = request(['email','password']);
        $is_remember= boolval(request('is_remeber'));
        if (\Auth::attempt($user,$is_remember)){
            return redirect('/posts');
        }

        return \Redirect::back()->withErrors("账号或密码输入错误");
    }//登出行为
    public function logout()
    {
        \Auth::logout();
        return redirect('/login');
    }
}
