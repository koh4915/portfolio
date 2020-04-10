<!--投稿一覧表示-->
<ul class="list-unstyled">
    @foreach($records as $record)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($record['user']->email, 80) }}" alt="">  
            <div class="media-body">
                <div class="text-left">
                    {!! link_to_route('users.show', $record['user']->name, [ 'id' => $record['user']->id ]) !!}
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

{{ $groupedPosts->links() }}