<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    
    // 一覧表示処理
    public function index()
    {
        $data = [];
        if(\Auth::check()) {
            $user = \Auth::user();
            $posts = $user->posts()->orderBy('created_at','desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'posts' => $posts,
            ];
        }
        
        return view('welcome',$data);
    }
    
    //新規登録画面表示処理
    public function create()
    {
        $post = new Post;
        
        return view('posts.create',['post' => $post,]);
    }
    
    // 新規登録処理
    public function store(Request $request)
    {
        $this->validate($request,[
            'date' => 'required|max:191',
            'workout' => 'required|max:191',
            'weight' => 'required|max:191',
            'repetition' => 'required|max:191',
            'set' => 'required|max:191',
        ]);
        
        $request->user()->posts()->create([
            'date' => $request->date,
            'workout' => $request->workout,
            'weight' => $request->weight,
            'repetition' => $request->repetition,
            'set' => $request->set,
        ]);
        
        return redirect('/');
    }
    
    // 削除処理
    public function destroy($id)
    {
        $post = \App\Post::first($id);
        
        if(\Auth::id() === $post->user_id) {
            $post->delete();
        }
        
        return back();
    }
}
