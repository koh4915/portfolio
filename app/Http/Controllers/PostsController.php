<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Post;

use App\User;

use Validator;

// use Illuminate\Database\Eloquent\Collection; 

class PostsController extends Controller
{
    
    // 一覧表示処理
    public function index()
    {
        $records = [];
        if(\Auth::check()) {
            $user = \Auth::user();
            
            $groupedPosts = Post::distinct()->select('date','user_id')->orderBy('created_at', 'desc')->simplePaginate(5); 
         
            foreach($groupedPosts as $record) {
                
                $posts = Post::where('date',$record->date)->where('user_id',$record->user_id)->get();
                $user = User::find($record->user_id);
                
                $records[] = [
                                'date' => $record->date,
                                'user' => $user,
                                'posts' => $posts
                             ];      
            }
            // dd($records);
        }
        
        return view('welcome',['records' => $records] , ['groupedPosts' => $groupedPosts]); 
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
        
        for($i = 0; $i<count($request->date); $i++){    
            if($request->date[$i] === null){
                break;
            }else{
                $post = new Post;
                $post->date = $request->date[$i];
                $post->workout = $request->workout[$i];
                $post->weight = $request->weight[$i];
                $post->repetition = $request->repetition[$i];
                $post->set = $request->set[$i];
                $post->user_id = \Auth::user()->id;

                // validatorを作成
                $validator = Validator::make($request->all(),[
                    'date.0' => 'required',
                    'workout.0' =>'required',
                    'weight.0' =>'required',
                    'repetition.0' =>'required',
                    'set.0' =>'required',
                    'user_id' =>'',
                ]);

                // バリデーションエラーの場合保存をスキップ
                if ($validator->fails()) { 
                    continue; 
                }
                $post->save();
            }
        }
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
