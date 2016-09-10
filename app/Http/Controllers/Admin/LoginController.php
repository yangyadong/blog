<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function login(){
        return view("Admin/login/login");
    }

    //登录验证
    public function validator(Request $request){
        if($request->input("code") == Session::get('phrase')){
            $res = DB::table('admin')
                ->where('account',$request->input("account"))
                ->first();
            if(!empty($res) && $res->password==md5($request->input("password"))){
                $request->session()->set('Admin_info',$res);
                if($res->user_id != 0){
                    $user_info = DB::table("user")
                        ->where('id',$res->user_id)
                        ->first();
                    $request->session()->set("user_info",$user_info);
                }
                return Controller::ajaxReturn(true,"登陆成功",0);
            }else{
                return Controller::ajaxReturn(false,"账号或密码错误",1);
            }
        }else{
            return Controller::ajaxReturn(false,"验证码错误",1);
        }
    }

    public function login_out(){
        Session::clearResolvedInstances();
        return Redirect::to('Admin/login');
    }

    //验证码
    public function captcha(){
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 110, $height = 30, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
        //把内容存入session
        Session::set('phrase', $phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }
}