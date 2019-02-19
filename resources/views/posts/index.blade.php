@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    <hr/>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="row">
                <div class="col-md-2">
                    <img width="100%" src="/storage/cover_images/{{$post->cover_image}}"/>
                </div>
                <div class="col-md-10">
                    <h1><a href="/posts/{{$post->id}}">{{$post->title}}</a></h1>
                    <p>{!! str_limit($post->body, $limit = 250, $end = '...') !!}</p>
                    <small>Written on {{$post->created_at}} Post created by {{$post->user->name}}</small>
                </div>           
            </div>
            <br/>
        @endforeach
        {{$posts->links()}}
    @else
            <p>No Posts Found</p>
    @endif
@endsection