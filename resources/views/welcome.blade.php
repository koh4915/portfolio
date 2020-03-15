@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <div class="text-center" style="margin-top: 250px;">
            <h1 style="font-size:130px;">MUSCLEGAIN</h1>
            <div class="row" style="margin-top:300px;">
                
                <!--投稿一覧表示-->
                @if (count($posts) > 0)
                    <div class="col-sm-12" style="margin-top:50px;">
                        @include('posts.posts', ['posts' => $posts])
                    </div>  
                @endif
                
            </div>
        </div>   
        
    @else
        <div class="text-center" style="margin-top: 250px;">
             <h1>{!! link_to_route('signup.get', 'Sign up', [], ['style' => 'color:white;' , 'class' => 'nav-link']) !!}</h1>
        </div>
    @endif
@endsection
