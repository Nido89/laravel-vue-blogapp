@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-info bg-dark mt-4">Edit Your Post here</h1>
    <hr>
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'PUT','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('body','Body')}}
        {{Form::textarea('body',$post->body,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Body Text'])}}
    </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
    <?php //Spoofing the POST rquest based on route:list for PUT or PATCH
    //{{Form::hidden('_method','PUT')}}
    ?>
    {{Form::submit('Submit',['class'=>'btn btn-success'])}}
    {!! Form::close() !!}
</div>
@endsection