<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function index(){
        return view('Admin/index/index')->with([
            'title'=>"首页",
        ]);
    }
}
