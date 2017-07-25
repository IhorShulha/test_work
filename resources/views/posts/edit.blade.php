@extends('layouts.app')

@section('content')

    <h1 style="text-align: center">View Posts</h1>

    <div class="col-sm-12">
        @if($posts)
            <table class="table">
                <thead>
                <tr>
                    <th>Author name</th>
                    <th>Title</th>
                    <th>Text</th>
                    <th>Data created</th>
                </tr>
                </thead>
                <tbody>


                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->user_id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{str_limit($post->decription, 50)}}</td>
                        <td>{{$post->created_at ? $post->created_at->diffForHumans() : 'No date'}}</td>
                    </tr>
                @endforeach
                @endif

                </tbody>
            </table>

    </div>

@stop

@stop