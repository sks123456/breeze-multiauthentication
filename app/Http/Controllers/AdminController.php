<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function post_page()
    {
        return view('admin.post_page');
    }

    public function add_post(Request $request)
    {
        $user=Auth()->user();
        $user_id=$user->id;
        $name=$user->name;
        $role=$user->role;

        $post=new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->post_status = 'active';
        $post->description = $request->description;
        $post->user_id = $user_id;
        $post->usertype = $role;
        $post->name = $name;
        ////////////////
        $image = $request->image;
        if ($image) {

            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $post->image = $imagename;
        }
        $post->save();
        return redirect()->back()->with('message','Post Added Successfully');
    }
}
