@extends('layouts.app')

@section('content')
    @if(Auth::check())
        {{Auth::user()->name}}
    @else
        <div class="text-center" style="margin-top: 250px;">
            
             <h1>{!! link_to_route('signup.get', 'Sign up', [], ['style' => 'color:white;' , 'class' => 'nav-link']) !!}</h1>
             
        </div>
    @endif
@endsection

