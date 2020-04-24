@extends('layouts.app')

@section('content')
    <div class="row">
    @include('users.card')
        <div class="col-sm-10" style="margin-top:50px;">
         @include('users.navtabs')
            
        <ul class="list-unstyled">
            @foreach($records as $record)
                <li class="media mb-3">
                    <div class="media-body">
                        <div>
                            @if(Auth::id() == $user->id)
                                <div class="text-left">
                                    {!! link_to_route('posts.edit', $record['date'], [ 'date' => $record['date'] , 'user' => $user ]) !!} 
                                </div>
                            @endif
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
    
<div style="margin-left:200px;">{{ $groupedPosts->links() }}</div>

@endsection