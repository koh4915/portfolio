<!--投稿一覧表示-->
<ul class="list-unstyled">
    @foreach ($posts as $post)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($post->user->email, 80) }}" alt="">
            <div class="media-body">
                <div class="text-left">
                    {!! link_to_route('users.show', $post->user->name, ['id' => $post->user->id]) !!} <span class="text-muted">posted at {{ $post->created_at }}</span>
                </div>
                <div>
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
    @endforeach
</ul>
{{ $posts->links('pagination::bootstrap-4') }}