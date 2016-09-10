<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function ajaxReturn($data = '',$msg = '', $msg_code = 0x0000) {
        $rlt['msg_code'] = $msg_code;
        $rlt['msg'] = $msg;
        $rlt['current_time'] = time();
        if(!empty($data)){
            $rlt['data']=$data;
        }else{
            $rlt['data']=false;
        }
        echo json_encode($rlt);
    }
}
