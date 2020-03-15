@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-2">
            <li class="media">
                <img class="mr-2 rounded" src="{{ Gravatar::src($user->email, 150) }}" alt="">
            </li>
        </aside>
        <div class="col-sm-10" style="margin-top:50px;">
            <ul class="nav nav-tabs nav-justified mb-3">
                <li class="nav-item"><a href="{{ route('users.show', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/' . $user->id) ? 'active' : '' }}">Posts <span class="badge badge-secondary">{{ $count_posts }}</span></a></li>
                <li class="nav-item"><a href="#" class="nav-link">Followings</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Followers</a></li>
            </ul>
            
            
            <!--自分の投稿を表示-->
            @if (count($posts) > 0)
                @include('posts.posts', ['posts' => $posts])
            @endif
            
         {!! link_to_route('posts.create','新規作成(テスト)',[],['class' => 'btn btn-primary']) !!}

        </div>
@endsection