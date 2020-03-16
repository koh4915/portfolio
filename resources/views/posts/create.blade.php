@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Create New</h1>
    </div>

    <div class="row">
        <div class="col-sm-12">
            {!! Form::model($post,['route' => 'posts.store']) !!}
            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>{!! Form::label('date','date:') !!}</th>
                        <th>{!! Form::label('workout','workout:') !!}</th>
                        <th>{!! Form::label('weight','weight:') !!}</th>
                        <th>{!! Form::label('repetition','repetition:') !!}</th>
                        <th>{!! Form::label('set','set:') !!}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{!! Form::text('date',null,['class' => 'form-control']) !!}</td>
                        <td>{!! Form::text('workout',null,['class' => 'form-control']) !!}</td>
                        <td>{!! Form::text('weight',null,['class' => 'form-control']) !!}</td>
                        <td>{!! Form::text('repetition',null,['class' => 'form-control']) !!}</td>
                        <td>{!! Form::text('set',null,['class' => 'form-control']) !!}</td>
                    </tr>
                </tbody>
            </table>
            
            {!! Form::submit('post',['class' => 'btn btn-outline-light btn-lg btn-block']) !!}
            
         {!! Form::close() !!}    
        </div>
    </div>
@endsection


            <!--<div class="form-group">-->
            <!--    {!! Form::label('date','date:') !!}-->
            <!--    {!! Form::text('date',null,['class' => 'form-control']) !!}-->
            <!--</div>-->
            
            <!--<div class="form-group">-->
            <!--    {!! Form::label('workout','workout:') !!}-->
            <!--    {!! Form::text('workout',null,['class' => 'form-control']) !!}-->
            <!--</div>-->
            
            <!--<div class="form-group">-->
            <!--    {!! Form::label('weight','weight:') !!}-->
            <!--    {!! Form::text('weight',null,['class' => 'form-control']) !!}-->
            <!--</div>-->
            
            <!--<div class="form-group">-->
            <!--    {!! Form::label('repetition','repetition:') !!}-->
            <!--    {!! Form::text('repetition',null,['class' => 'form-control']) !!}-->
            <!--</div>-->
            
            <!--<div class="form-group">-->
            <!--    {!! Form::label('set','set:') !!}-->
            <!--    {!! Form::text('set',null,['class' => 'form-control']) !!}-->
            <!--</div>-->