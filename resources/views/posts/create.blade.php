@extends('layouts.app')

@section('content')

    <h1 style="text-align: center">Create Article</h1>

    {!! Form::open(['method' => 'POST', 'action' => 'PostsController@create']) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('decription', 'Decription:') !!}
        {!! Form::textarea('decription', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Add article', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@stop