<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $offset = 10; // 分页数

    public $jsonRes = ['code' => 0, 'msg' => ''];
}
