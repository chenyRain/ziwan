<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $jsonRes = ['code' => 500, 'msg' => ''];
}
