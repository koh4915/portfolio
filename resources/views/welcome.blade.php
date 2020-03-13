@extends('layouts.app')

@section('content')

        <div class="text-center" style="margin-top: 250px;">
            <h1>Sign up</h1>
            <p style>背景画像</p>
             {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
        
@endsection

