@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Go back</a>
    <hr/>
    <h1>{{$post->title}}</h1>
    <img width="60%" src="/storage/cover_images/{{$post->cover_image}}"/>
    <p>{!!$post->body!!}</p>
    <small>Written on {{$post->created_at}} Post created by {{$post->user->name}}</small>
    <hr/>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-primary"><i class="fa fa-edit"> Edit</i></a>
            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection