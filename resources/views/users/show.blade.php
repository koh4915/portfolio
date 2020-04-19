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
                <li class="nav-item"><a href="{{ route('users.show', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/' . $user->id) ? 'active' : '' }}">Posts</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Followings</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Followers</a></li>
            </ul>
            
            <!--投稿表示(自分の投稿のみ)-->
            <ul class="list-unstyled">
                @foreach($records as $record)
                    <li class="media mb-3">
                        <div class="media-body">
                            <div>
                                <div class="text-left">
                                    {!! link_to_route('posts.edit', $record['date'], [ 'date' => $record["date"] ]) !!}  <!--投稿編集ページへ-->
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>date</th>
                                            <th>workout</th>
                                            <th>weight</th>
                                            <th>repetition</th>
                                            <th>set</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($record["posts"] as $row)
                                        <tr>
                                            <td>{{ $row->date }}</td>
                                            <td>{{ $row->workout}}</td>
                                            <td>{{ $row->weight }}</td>
                                            <td>{{ $row->repetition }}</td>
                                            <td>{{ $row->set }}</td>
                                        </tr>
                                    @endforeach    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </li>
                @endforeach    
            </ul>
        </div>
{{ $groupedPosts->links() }}

@endsection