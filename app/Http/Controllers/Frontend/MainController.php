<?php
/**
 * Created by PhpStorm.
 * User: Cheney
 * Date: 2018/5/23
 * Time: 22:44
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }
}