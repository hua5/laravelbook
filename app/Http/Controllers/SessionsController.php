<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
//登录逻辑
class SessionsController extends Controller
{
    public function create(){
        return view('sessions.create');
    }
    public function store(Request $request){
        $this->validate($request,[
           'email' => 'required|email|max:255',
           'password' => 'required'
        ]);

        $credentials = [
            'email'     => $request->email,
            'password'  => $request->password,
        ];
 //laravel自带的 Auth::attempt第一个参数为需要进行用户身份认证的数组，第二个参数为是否为用户开启『记住我』功能的布尔值
        if (Auth::attempt($credentials,$request->has('remember'))){
           session()->flash('success', '欢迎回来！');
           
           return redirect()->route('users.show', [Auth::user()]);
        }else{
           session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
           return redirect()->back();

        }
    }

    public function destroy(){
        Auth::logout();
        session()->flash('success','您已成功退出');
        return redirect('login');
    }
}