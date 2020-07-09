@extends('layouts.app')

@section('content')

<div class="jumbotron mt-4 text-dark bg-light ">
    <h1 class="text-dark bg-warning ">{{$post->title}}</h1>
    <div>
        <p class=" lead ">
        {!!$post->body!!}
    </p>
    </div>

    <small class="text-warning bg-dark">Written on {{$post->created_at}}</small>

    <div>
        <hr>
        <a href="/lsapp/public/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
    <a href="../posts" class="btn btn-warning">Go Back</a>
    </div>
    <hr>
    
    {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'DELETE','class' =>'pull-right']) !!}

    
    {{Form::submit('Delete',['class' =>'btn btn-danger'])}}
    {!!Form::close()!!}

</div>
@endsection