@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1><i>Record</i></h1>
    </div>
        {!! Form::open(['url' => route("posts.store")]) !!}
            {{ csrf_field() }}
            <table align="center" style="margin-top:50px;">
                <tr class="table white-space-nowrap text-center">
                    <th>date</th>
                    <th>workout</th>
                    <th>weight</th>
                    <th>repetition</th>
                    <th>set</th>
                </tr>
            @for($i = 0 ; $i <10; $i ++)
                <tr>
                    <td><input type="text" name="date[]" pattern="\d{4}-\d{2}-\d{2}"></td>
                    <td><input type="text" name="workout[]"></td>
                    <td><input type="text" name="weight[]" pattern="[1-9][0-9]*"></td>
                    <td><input type="text" name="repetition[]" pattern="[1-9][0-9]*"></td>
                    <td><input type="text" name="set[]" pattern="[1-9][0-9]*"></td>
                </tr>
            @endfor   
            </table>
            <div align="center">
                <tr><td><input type="submit" value="Post" style="width:965px;" ></td></tr>
            </div>

        {!! Form::close() !!}
        
@endsection

