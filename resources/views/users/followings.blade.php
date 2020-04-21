@extends('layouts.app')

@section('content')
    <div class="row">
    @include('users.card')
        <div class="col-sm-10" style="margin-top:50px;">
        @include('users.navtabs')

        @include('users.users', ['users' => $users])
        </div>
    </div>
    
@endsection      