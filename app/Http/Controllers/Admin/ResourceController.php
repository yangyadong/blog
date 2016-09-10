<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;

class ResourceController extends Controller
{
    public function my_resource(){
        dump("my_resource");
    }
    public function update_resource(){
        dump("update_resource");
    }
}
