@extends('layouts.app')

@section('content')

    <h1 style="text-align: center">Edit Post</h1>

    <div class="col-sm-12">
        <div class="row">
            {!! Form::model($post,['method' => 'PUT', 'action' => ['PostsController@update', $post->id]]) !!}
            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('decription', 'Decription:') !!}
                {!! Form::textarea('decription', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        @include('error.errors')
    </div>

@stop
