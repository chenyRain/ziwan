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

    /**
     * 首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.index');
    }
}