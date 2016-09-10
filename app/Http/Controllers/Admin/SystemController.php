<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SystemController extends Controller
{
    public function type_list(){
        $article_type = DB::table('article_type')->get();
        return view("Admin/System/type_list")->with([
            'title'=>"分类列表",
            "article_type"=>$article_type
        ]);
    }

    public function setting(Request $request){
        $id = $request->get('id');
        $type = DB::table('article_type')->where('id',$id)->first();
        return view("Admin/System/setting")->with([
            'title'=>"编辑分类",
            "type_info"=>$type
        ]);
    }

    public function set(Request $request){
        $id = $request->input('id');
        $name = $request->input('name');
        $type = $request->input('type');
        $status = $request->input('status');
        $data['name']=$name;
        $data['type']=$type;
        $data['status']=$status;
        if(empty($id)){
            $res = DB::table('article_type')->insertGetId($data);
        }else{
            $res = DB::table('article_type')->where('id',$id)->update($data);
        }
        if(empty($res)){
            return self::ajaxReturn(false,"操作失败",1);
        }else{
            return self::ajaxReturn(true,"操作成功",0);
        }
    }
}
