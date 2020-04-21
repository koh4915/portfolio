<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;  

use App\Post; 

class UsersController extends Controller
{
    // ユーザー一覧
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(10);
        
        return view('users.index',['users' => $users,]);
    }
    
    // ユーザー詳細
    public function show($id)
    {
        $user = User::find($id);
        $groupedPosts = Post::distinct()->where('user_id' , $user->id)->select('date','user_id')->orderBy('created_at', 'desc')->simplePaginate(5); 
        
        $records = [];
        foreach($groupedPosts as $record) {
            
            $posts = Post::where('date',$record->date)->where('user_id',$record->user_id)->get();
            
            $records[] = [
                'date' => $record->date, 
                'user' =>$user,
                'posts' => $posts,
            ]; 
        }
        
        return view('users.show',[
            'user' => $user,
            'records' => $records,
            'groupedPosts' => $groupedPosts
        ]); 
    }
    
    
    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->simplePaginate(10);
        
        $data = [
            'user' => $user,
            'users' => $followings,
        ];
        // dd($data);
        return view('users.followings' , $data);
    }
    
    
    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->simplePaginate(10);
        
        $data = [
            'user' => $user,
            'users' => $followers,
        ];
        
        return view('users.followers' , $data);
    }
}
