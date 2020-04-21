<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
    // 一対多
    public function records()
    {
        return $this->hasMany(Post::class);
    }
    
    
    // 多対多
    public function followings()
    {
        return $this->belongsToMany(User::class , 'user_follow' , 'user_id' , 'follow_id')->withTimestamps();
    }
    
    
    public function followers()
    {
        return $this->belongsToMany(User::class , 'user_follow' , 'follow_id' , 'user_id')->withTimestamps();
    }
    
    
    public function follow($userId)
    {
        // 既にフォロー
        $exist = $this->is_following($userId);
        
        // 相手が自分自身
        $its_me = $this->id == $userId;
    
        if($exist || $its_me){
            // どちらか当てはまれば何もしない
            return false;
        }else{
            // フォロー
            $this->followings()->attach($userId);
            return true;
        }
    }
    
    
    public function unfollow($userId)
    {
        // 既にフォロー
        $exist = $this->is_following($userId);
        
        // 相手が自分自身
        $its_me = $this->id ==$userId;
        
        if($exist && !$its_me){
            // ２つとも当てはまればフォローを外す
            $this->followings()->detach($userId);
            return true;
        }else{
            // 何もしない
            return false;
        }
    }
    
    
    // フォローしているかの判定
    public function is_following($userId)
    {
        return $this->followings()->where('follow_id' , $userId)->exists();
    }
}
