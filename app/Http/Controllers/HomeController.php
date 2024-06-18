<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(){
        if(Auth::id()){
            $post = Post::all();

            $usertype=Auth()->user()->role;

            if($usertype==1)
            {
            return redirect()->route('login');
            }else if($usertype==2)
            {
                return view('admin',compact('post'));
            }else if($usertype==3)
            {
                return view('normal',compact('post'));
            }
        }
    }

    public function homepage()
    {
        $post = Post::all();

        return view ('home.homepage',compact('post'));
    }
}
