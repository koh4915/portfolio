<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;  //追加

class UsersController extends Controller
{
    // ユーザー一覧
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(10);
        
        return view('users.index',[
            'users' => $users,
        ]);
    }
    
    // ユーザー詳細
    public function show($id)
    {
        $user = User::find($id);
        $posts = $user->posts()->orderBy('created_at','desc')->paginate(5);
        
        $data = [
            'user' => $user,
            'posts' => $posts,
        ];
        
        $data += $this->counts($user);
        
        return view('users.show',$data);
    }
}
