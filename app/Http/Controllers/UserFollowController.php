<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFollowController extends Controller
{
    public function store(Request $request , $id)
    {
        // モデルで定義したfollowメソッド
        \Auth::user()->follow($id);
        return back();
    }
    
    public function destroy($id)
    {
        // モデルで定義したunfollowメソッド
        \Auth::user()->unfollow($id);
        return back();
    }
}
