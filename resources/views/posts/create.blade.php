@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Create New</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            {!! Form::model($post,['route' => 'posts.store']) !!}
            
            <div class="form-group">
                {!! Form::label('date','date:') !!}
                {!! Form::text('date',null,['class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('workout','workout:') !!}
                {!! Form::text('workout',null,['class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('weight','weight:') !!}
                {!! Form::text('weight',null,['class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('repetition','repetition:') !!}
                {!! Form::text('repetition',null,['class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('set','set:') !!}
                {!! Form::text('set',null,['class' => 'form-control']) !!}
            </div>
            
            
            
            {!! Form::submit('post',['class' => 'btn btn-outline-light btn-lg btn-block']) !!}
            
         {!! Form::close() !!}    
        </div>
    </div>
@endsection