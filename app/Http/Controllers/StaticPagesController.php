<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use DB;

class StaticPagesController extends Controller
{
    public function home(){
        $feed_items = [];
        DB::table('users') ->where('id', 1)->update(['votes' => 1]);
        if (Auth::check()) {
            $feed_items = Auth::user()->feed()->paginate(30);
            
        }

        return view('static_pages/home',compact('feed_items'));
    }
    public function help(){
        return view('static_pages/help');
    }
    public function about(){
        return view('static_pages/about');
    }
}
