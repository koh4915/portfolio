@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <div class="center jumbotron">
            <div class="text-center">
                <h1>MUSCLEGAIN</h1>
            </div>
        </div>    
        
        <div style="margin-top:350px;">
            @if (count($records) > 0)
                @include('posts.posts')
            @endif
        </div>    
    @else
        <div class="text-center" style="margin-top: 250px;">
             <h1>{!! link_to_route('signup.get', 'Sign up', [], ['style' => 'color:white;' , 'class' => 'nav-link']) !!}</h1>
        </div>
        <div class="loginpass">Email : test@test.test , Password : test123</div>
    @endif
@endsection

