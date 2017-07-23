@extends('layouts.app')

@section('content')

    <h1 style="text-align: center">Posts</h1>

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
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->decription}}</td>
                    <td>{{$post->created_at}}</td>
                </tr>
                @endforeach
            @endif

        </tbody>

    </table>

    @stop