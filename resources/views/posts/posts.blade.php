<!--投稿一覧表示-->
<ul class="list-unstyled">
    
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($user->email, 80) }}" alt="">
            <div class="media-body">
                <div class="text-left">
                    {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!}
                </div>
                <div class>
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
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->date }}</td>
                                <td>{{ $post->workout }}</td>
                                <td>{{ $post->weight}}</td>
                                <td>{{ $post->repetition }}</td>
                                <td>{{ $post->set }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </li>
        
</ul>
{{ $posts->links('pagination::bootstrap-4') }}