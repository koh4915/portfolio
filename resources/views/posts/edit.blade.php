@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1><i>Record editing</i></h1>
</div>

 <ul class="list-unstyled">
    <li>
         <div style="margin-top: 60px;">
            {!! Form::open(['url' => route("posts.update")]) !!}
            {{ csrf_field() }}
                 <table align="center" style="margin-top:80px;">
                    <thead>
                        <tr class="table white-space-nowrap text-center">
                            <th>date</th>
                            <th>workout</th>
                            <th>weight</th>
                            <th>repetition</th>
                            <th>set</th>
                            <th hidden>id</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($groupedPost as $row)
                            <tr>
                                <td><input type="text" name="date[]" value="{{$row->date}}" ></td>
                                <td><input type="text" name="workout[]" value="{{$row->workout}}"></td>
                                <td><input type="text" name="weight[]" value="{{$row->weight}}"></td>
                                <td><input type="text" name="repetition[]" value="{{$row->repetition}}"></td>
                                <td><input type="text" name="set[]" value="{{$row->set}}"></td>
                                <td><input type="hidden" name="id[]" value="{{$row->id}}" ></td>
                             </tr>
                        @endforeach    
                    </tbody>
                </table>
            
                <div align="center" style="margin-top:80px;">{!! Form::submit(' Update ',['class' => 'btn btn-outline-info btn-lg']) !!}</div>    
            {!! Form::close() !!}
            
            {!! Form::open(['route' => ['posts.destroy', 'date' =>$row->date , 'user' => $row->user_id], 'method' => 'delete']) !!}
                <div align="center" style="margin-top:30px;">{!! Form::submit(' Delete ', ['class' => 'btn btn-outline-danger btn-lg']) !!}</div>    
            {!! Form::close() !!}
            
        </div>
     </li>
 </ul>
        
@endsection