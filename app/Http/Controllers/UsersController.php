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
        $records = [];
        $user = User::find($id);
        $groupedPosts = Post::distinct()->select('date','user_id')->orderBy('created_at', 'desc')->simplePaginate(5); 
        
        // dd($groupedPosts);
        
        foreach($groupedPosts as $record) {
            
            $posts = Post::where('date',$record->date)->where('user_id',$record->user_id)->get();
            
            $records[] = [
                'date' => $record->date, 
                'user' => $user,
                'posts' => $posts,
            ]; 
            // dd($records);
        }

        return view('users.show',[
            'user' => $user,
            'records' => $records,
            'groupedPosts' => $groupedPosts
            ]); 
    }
    
    
    // カレンダーページ
    public function record(){
        
        return view('users.record');
    }
    
    
    // ギャラリーページ
    public function gallery(){
        
        return view('users.gallery');
    }
    
}
