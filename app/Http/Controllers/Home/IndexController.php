<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class IndexController extends Controller
{
    public function index(){
        $title = self::title_page();
        $new_title = DB::table('article as ar')
            ->join('article_type as at','at.id','=','ar.type')
            ->select('ar.id','ar.name','at.type')
            ->where('ar.status','=',0)
            ->orderBy('ar.update_time','desc')
            ->limit(5)
            ->get();
        $like_title = DB::table('article as ar')
            ->join('article_type as at','at.id','=','ar.type')
            ->select('ar.id','ar.name','at.type')
            ->where('ar.status','=',0)
            ->orderBy('ar.praise','desc')
            ->limit(5)
            ->get();
        return view('Home/Index/index')
            ->with('new_title',$new_title)
            ->with('like_title',$like_title)
            ->with('title',$title);
    }

    //分页获得数据
    public function title_page(){
        $title = DB::table('article as ar')
            ->join('admin as ad','ar.admin_id','=','ad.id')
            ->join('article_type as at','at.id','=','ar.type')
            ->where('ar.status','=',0)
            ->select('at.name as article_type','at.type','at.id as type_id','ar.id as article_id','ar.name as title','ar.update_time','ar.image','ar.content','ad.name')
            ->orderBy('ar.update_time','desc')
            ->simplePaginate(Config::get('my.page'))
            ->toArray();
        return $title['data'];
    }

    public function about(){
        $user = DB::table('user')->first();
        return view('Home/Index/about')
            ->with('user',$user);
    }

    public function moodlist(){
        $moodlist = self::moodlist_more();
        return view('Home/Index/moodlist')
            ->with('moodlist_title',$moodlist);
    }

    public function moodlist_more(){
        $moodlist = DB::table('article as a')
            ->join('article_type as at','at.id','=','a.type')
            ->where('at.type','=',1)
            ->where('a.status','=',0)
            ->select('a.*')
            ->orderBy('a.update_time','desc')
            ->simplePaginate(Config::get('my.page'))->toArray();
        return $moodlist['data'];
    }

    public function knowledge(Request $request){
        $type_id = $request->get('type_id',0);
        $knowledge = self::knowledge_more($type_id);
        $article_type = DB::table('article_type')->where('type',0)->select('id','name')->get();
        $new_title = DB::table('article as a')
            ->join('article_type as at','at.id','=','a.type')
            ->where('at.type','=',0)
            ->where('a.status','=',0)
            ->orderBy('a.update_time','desc')
            ->limit(5)
            ->select('a.id','a.name')
            ->get();
        $like_title = DB::table('article as a')
            ->join('article_type as at','at.id','=','a.type')
            ->where('at.type','=',0)
            ->where('a.status','=',0)
            ->orderBy('a.praise','desc')
            ->limit(5)
            ->select('a.id','a.name')
            ->get();
        return view('Home/Index/knowledge')
            ->with('new_title',$new_title)
            ->with('like_title',$like_title)
            ->with('knowledge',$knowledge)
            ->with('type_id',$type_id)
            ->with('article_type',$article_type);
    }

    public function knowledge_more($type_id=false){
        if ($type_id===false){
            $type_id = $_GET['type_id'];
        }
        $article = DB::table('article as ar');
        $article->join('admin as ad','ar.admin_id','=','ad.id')
            ->join('article_type as at','at.id','=','ar.type')
            ->where('at.type','=',0)
            ->where('ar.status','=',0);
        if(!empty($type_id)){
            $article->where('ar.type','=',$type_id);
        }
        $knowledge = $article->select('ar.id','ar.name as title','ar.update_time','ar.image','ar.content','ad.name','at.name as type','at.id as type_id')
            ->orderBy('ar.update_time','desc')
            ->simplePaginate(Config::get('my.page'))
            ->toArray();
        return $knowledge['data'];
    }

    public function title_info(Request $request){
        $title_id = $request->get('t_id');
        $article = DB::table('article as ar')
            ->join('admin as ad','ar.admin_id','=','ad.id')
            ->join('article_type as at','at.id','=','ar.type')
            ->where('ar.status','=',0)
            ->where('ar.id','=',$title_id)
            ->select('ar.id','ar.praise','ar.name as title','ar.update_time','ar.image','ar.content','ad.name','at.name as type','at.id as type_id')
            ->first();
        if (empty($article)){
            return view('errors/404');
        }
        $article_type = DB::table('article_type')->where('type',0)->select('id','name')->get();
        $new_title = DB::table('article as a')
            ->join('article_type as at','at.id','=','a.type')
            ->where('at.type','=',0)
            ->where('a.status','=',0)
            ->orderBy('a.update_time','desc')
            ->limit(5)
            ->select('a.id','a.name')
            ->get();
        $like_title = DB::table('article as a')
            ->join('article_type as at','at.id','=','a.type')
            ->where('at.type','=',0)
            ->where('a.status','=',0)
            ->orderBy('a.praise','desc')
            ->limit(5)
            ->select('a.id','a.name')
            ->get();
        return view('Home/Index/title_info')
            ->with('new_title',$new_title)
            ->with('like_title',$like_title)
            ->with('title_info',$article)
            ->with('article_type',$article_type);
    }

    public function moodlist_info(Request $request){
        $title_id = $request->get('t_id');
        $article = DB::table('article as ar')
            ->join('article_type as at','at.id','=','ar.type')
            ->where('at.type','=',1)
            ->where('ar.status','=',0)
            ->where('ar.id','=',$title_id)
            ->select('ar.id','ar.praise','ar.name as title','ar.update_time','ar.image','ar.content','at.name as type','at.id as type_id')
            ->first();
        if (empty($article)){
            return view('errors/404');
        }
        return view('Home/Index/moodlist_info')
            ->with('title_info',$article);
    }

    public function praise(Request $request){
        $id = $request->input('id');
        $res = DB::table('article')->where('id',$id)->increment('praise');
        if(empty($res)){
            self::ajaxReturn('false','系统错误',1);
        }else{
            self::ajaxReturn('true','true',0);
        }
    }

}
