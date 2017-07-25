@extends('layouts.app')

@section('content')

    <h1 style="text-align: center">List Posts</h1>

    <div class="col-sm-12">
    @if($posts)
    <table class="table">
        <thead>
        <tr>
            <th>Author name</th>
            <th>Data created</th>
            <th>Title</th>
            <th>Text</th>
        </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->user_id}}</td>
                    <td>{{$post->created_at ? $post->created_at->diffForHumans() : 'No date'}}</td>
                    <td><a href="{{URL::to('/post/'.$post->id)}}">{{$post->title}}</a></td>
                    <td>{{str_limit($post->decription, 50)}}</td>

                    <td>
                        <a href="{{URL::to('/post/'.$post->id.'/edit')}}" class="btn btn-info">Edit</a>

                        {{ Form::open(['route' => ['delete.route', $post->id], 'method' => 'delete']) }}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger'])!!}
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            @endif
            <a href="{{URL::to('/create/')}}" class="btn btn-danger">Create Ad</a>
        </tbody>
    </table>
            {{$posts->links()}}
    </div>

    @stop