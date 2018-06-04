<?php
/**
 * Created by PhpStorm.
 * User: Cheney
 * Date: 2018/5/23
 * Time: 22:44
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{

    /**
     * 首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        return view('frontend.index', compact('user'));
    }
}