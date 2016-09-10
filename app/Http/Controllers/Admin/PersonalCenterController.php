<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;

class PersonalCenterController extends Controller
{
    public function write(){
        $article_type = DB::table("article_type")
            ->where("status",0)
            ->select("name","id")
            ->get();
        return view("Admin/PersonalCenter/write")->with([
            'title'=>"写文章",
            'default'=>'/Admin/image/title_default.png',
            "article_type"=>$article_type
        ]);
    }
    public function add_write(Request $request){
        $data = $request->all();
        $data = array_except($data, ['_token']);
        $data["update_time"]=$data["set_time"]=time();
        $data["admin_id"]=Session::get("Admin_info")->id;
        $res = DB::table('article')->insertGetId($data);
        if(empty($res)){
            return BaseController::ajaxReturn(false,"发表失败",1);
        }else{
            return BaseController::ajaxReturn($res,"发表成功",0);
        }
    }

    public function my_articles(Request $request){
        $seek = $request->input("seek");
        $type = $request->input("type",0);
        $status = $request->input("status",2);
        $article = $this->find_my_articles($type,$status);
        if(empty($seek)){
            $article_type = DB::table("article_type")
                ->where("status",0)
                ->select("name","id")
                ->get();
            return view("Admin/PersonalCenter/my_articles")->with([
                'title'=>"我的文章",
                "article"=>$article,
                "article_type"=>$article_type
            ]);
        }else{
            if(empty($article)){
                return BaseController::ajaxReturn(false,"暂无数据",1);
            }else{
                return BaseController::ajaxReturn($article,"查询成功",0);
            }
        }
    }

    public function save_articles(Request $request){
        $res = DB::table("article")
            ->where("id",$request->input("id"))
            ->update(array('status' => $request->input("status")));
        if(empty($res)){
            return BaseController::ajaxReturn(false,"操作失败",1);
        }else{
            return BaseController::ajaxReturn(true,"操作成功",0);
        }
    }

    public function find_my_articles($type,$status){
        $where["a.admin_id"]=Session::get("Admin_info")->id;
        if($type!=0){
            $where["a.type"]=$type;
        }
        if($status!=2){
            $where["a.status"]=$status;
        }
        $article = DB::table("article as a")
            ->join('admin as ad', 'ad.id', '=', 'a.admin_id')
            ->where($where)
            ->select("ad.name","a.id","a.name as title","a.update_time","a.status","a.image")
            ->get();
        foreach($article as $key => $value){
            $value->update_time = date("Y-m-d H:i:s",$value->update_time);
            $value->image = '<img src='.$value->image.'>';
            $value->title = '<a href="/Admin/articles_info?article='.$value->id.'">'.$value->title.'</a>';
            if($value->status == 1){
                $value->operation="<label><input article_id=".$value->id." value=".$value->status." class='checkbox-slider slider-icon colored-blue' type='checkbox'><span class='text'></span></label>";
            }else{
                $value->operation="<label><input article_id=".$value->id." value=".$value->status." class='checkbox-slider slider-icon colored-blue' checked='checked' type='checkbox'><span class='text'></span></label>";
            }
        }
        return $article;
    }

    public function articles_info(Request $request){
        $article_id = $request->get('article');
        $article_info = DB::table('article as a')
            ->join('article_type as at','a.type','=','at.id')
            ->where('a.id',$article_id)
            ->select('a.id','a.name as title','a.content','a.image','at.name')
            ->first();
        return view("Admin/PersonalCenter/articles_info")->with([
            'title'=>"文章详情",
            "article"=>$article_info,
        ]);
    }

    public function save_write(Request $request){
        $article = $request->get('save');
        $article_info = DB::table('article')
            ->where('id',$article)
            ->first();
        $article_type = DB::table("article_type")
            ->where("status",0)
            ->select("name","id")
            ->get();
        return view("Admin/PersonalCenter/save_write")->with([
            'title'=>"编辑文章",
            "article"=>$article_info,
            "article_type"=>$article_type,
            "article_id"=>$article,
        ]);
    }

    public function save_article(Request $request){
        $data = $request->all();
        $data = array_except($data, ['_token']);
        $article =  $data['article'];
        $data = array_except($data, ['article']);
        $data["update_time"]=time();
        $res = DB::table('article')
            ->where('id',$article)
            ->update($data);
        if(empty($res)){
            return BaseController::ajaxReturn(false,"编辑失败",1);
        }else{
            return BaseController::ajaxReturn($article,"编辑成功",0);
        }
    }

    public function edit_info(){
        return view("Admin/PersonalCenter/edit_info")->with([
            'title'=>"编辑信息",
            'user_info'=>Session::get("user_info")
        ]);
    }

    public function save_info(Request $request){
        $info = $request->all();
        $info = array_except($info, ['_token']);
        $info['update_time']=time();
        $info['birthday'] = strtotime($info['birthday']);
        $info['id'] = Session::get("user_info")->id;
        $res = DB::table("user")
            ->where("id",Session::get("user_info")->id)
            ->update($info);
        if(empty($res)){
            return Redirect::to('Admin/edit_info');
        }else{
            Session::set("user_info",(object)($info));
            return Redirect::to('Admin/edit_info');
        }
    }

    public function edit_password(){
        return view("Admin/PersonalCenter/edit_password")->with([
            'title'=>"编辑信息",
            'user_info'=>Session::get("user_info")
        ]);
    }

    public function upload_img(Request $request){
        $file = $request->file("photo_image");
        $allowed_extensions = ["png", "jpg", "gif"];
        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
            return ['error' => 'You may only uploads png, jpg or gif.'];
        }

        $destinationPath = realpath(base_path('public/uploads/image/'));
        if(!file_exists($destinationPath))
            mkdir($destinationPath,0777,true);
        $extension = $file->getClientOriginalExtension();
        $fileName = str_random(10).'.'.$extension;
        if($file->move($destinationPath,$fileName) == false){
            return responseToJson(3,'保存文件失败！');
        }
        return Response::json(
            [
                'success' => true,
                'pic' => '/uploads/image/'.$fileName,
            ]
        );
    }
}
