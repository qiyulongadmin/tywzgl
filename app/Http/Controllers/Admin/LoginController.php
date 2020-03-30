<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use App\Model\Super;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class LoginController extends Controller
{
    //后台登录页
    public function login(){
        return view('admin.login');
    }


    //处理用户登录
    public function dologin(Request $request)
    {
        //1.接收表单提交的数据
        $input=$request->except('_token');
        // $input = $request->only(['username', 'password']);
        // $input = $request->all();

        //2.进行表单验证
        // $validator = Validator::make('需要验证的表单数据','验证规则','错误提示信息');
        $rule = [
            'username' => 'required|between:4,18',
            'password' => 'required|between:4,18|alpha_dash',
            'captcha' => ['required', 'captcha'],
        ];

        $message = [
                        'username.required' => '用户名不能为空',
                        'username.between' => '用户名长度必须4到18位',
                        'password.required' => '密码不能为空',
                        'password.between' => '密码长度必须4到18位',
                        'password.alpha_dash' => '密码必须是数字、字母、下划线',
                        'captcha.required' => '验证码不能为空',
                        'captcha.captcha' => '请输入正确的验证码',
                    ];

        $validator = Validator::make($input, $rule, $message);

        if ($validator->fails()) {
            return redirect('admin/login')
                        ->withErrors($validator)
                        ->withInput();
        }

    //     //3.验证是否有此用户
        $super = Super::where('name',$input['username'])->first();
        if(!$super){
            return redirect('admin/login')->with('errors','不存在该用户');
        }

        if($input['password'] != $super->password){
            return \redirect('admin/login')->with('errors','密码错误');
        }


        //4.保存用户信息到session中
        session() -> put('super',$super);//put('键','值');

        //5.跳转到后台首页
        return \redirect('admin/index');
    }

    // //加密算法
    // public function jiami()
    // {
    //     //1.md5加密，生成32位字符串。可以加盐值（自己写算法） ‘salt’.‘123’；
    //     // $str = 123;
    //     // return \md5($str);

    //     return Crypt::encrypt('123456');
    // }

    //后台首页
    public function index()
    {
        return \view('admin/index');
    }

    //后台欢迎页
    public function welcom()
    {
        return \view('admin/welcom');
    }

    //登出
    public function logout()
    {
        //清空session中的用户信息
        session()->flush();
        //跳转到登录页面
        return redirect('admin/login');
    }




}
