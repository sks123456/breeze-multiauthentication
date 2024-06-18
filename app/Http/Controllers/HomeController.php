<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PDO;

class HomeController extends Controller
{
    public function index(){
        if(Auth::id()){
            $usertype=Auth()->user()->role;

            if($usertype==1)
            {
            return redirect()->route('login');
            }else if($usertype==2)
            {
                return view('admin');
            }else if($usertype==3)
            {
                return view('normal');
            }
        }
    }

    public function homepage(){
        return view ('home.homepage');
    }
}
