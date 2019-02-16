@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-primary">Go back</a>
    <hr/>
    <h1>{{$post->title}}</h1>
    <p>{{$post->body}}</p>
    <small>Written on {{$post->created_at}}</small>
@endsection