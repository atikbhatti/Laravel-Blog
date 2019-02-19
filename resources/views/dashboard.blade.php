@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Your blog posts</h3>
                    @if(count($posts) > 0)
                        <table class="table table-striped text-center">
                            <tr>
                                <th>Title</th>
                                <th>Written at</th>
                                <th>Action</th>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->created_at}}</td>
                                    <td class="btn btn-default">                              
                                        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                        <a href="/posts/{{$post->id}}/edit" class="btn btn-primary float-right"><i class="fa fa-edit"></i> Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>No Posts Found</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
