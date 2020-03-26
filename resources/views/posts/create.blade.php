@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Create New</h1>
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
            @for($i = 0 ; $i <8; $i ++)
                <tr>
                    <td><input type="text" name="date[]"></td>
                    <td><input type="text" name="workout[]"></td>
                    <td><input type="text" name="weight[]"></td>
                    <td><input type="text" name="repetition[]"></td>
                    <td><input type="text" name="set[]"></td>
                </tr>
            @endfor   
            </table>
            <div align="center">
                <tr><td><input type="submit" value="Post" style="width:965px;" ></td></tr>
            </div>

        {!! Form::close() !!}
        
@endsection

         
         
    <!--<div class="row">-->
        <!--    <div class="col-sm-12">-->   
        
         <!--   {!! Form::model($post,['route' => 'posts.store']) !!}-->
            
         <!--   <table class="table table-bordered">-->
         <!--       <thead>-->
         <!--           <tr>-->
         <!--               <th>{!! Form::label('date','date:') !!}</th>-->
         <!--               <th>{!! Form::label('workout','workout:') !!}</th>-->
         <!--               <th>{!! Form::label('weight','weight:') !!}</th>-->
         <!--               <th>{!! Form::label('repetition','repetition:') !!}</th>-->
         <!--               <th>{!! Form::label('set','set:') !!}</th>-->
         <!--           </tr>-->
         <!--       </thead>-->
         <!--       <tbody>-->
         <!--           <tr>-->
         <!--               <td>{!! Form::text('date',null,['class' => 'form-control']) !!}</td>-->
         <!--               <td>{!! Form::text('workout',null,['class' => 'form-control']) !!}</td>-->
         <!--               <td>{!! Form::text('weight',null,['class' => 'form-control']) !!}</td>-->
         <!--               <td>{!! Form::text('repetition',null,['class' => 'form-control']) !!}</td>-->
         <!--               <td>{!! Form::text('set',null,['class' => 'form-control']) !!}</td>-->
         <!--           </tr>-->
         <!--       </tbody>-->
         <!--   </table>-->
            
         <!--   {!! Form::submit('post',['class' => 'btn btn-outline-light btn-lg btn-block']) !!}-->
            
         <!--{!! Form::close() !!}    -->
         
    <!--    </div>-->
    <!--</div>-->

