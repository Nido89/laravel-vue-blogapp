@extends('layouts.app')

@section('content')

    <div>
    <h1 class="text-dark bg-light mt-4">All Blog Posts </h1>
    </div>
    <a class="text-dark btn btn-warning nav-link" href="/lsapp/public/posts/create" type="submit">Create New Post</a>
    <h2 class="text-dark bg-info mt-4">Old Blog Posts </h2>
    @if (count($posts) >0)
        @foreach ($posts as $post)
            <div class=" mt-2 card card-body bg-dark border-warning text-white">
            <h4><a class="text-white" href="./posts/{{$post->id}}"> {{$post->title}}</a></h4>
            <small class="text-warning">Written on {{$post->created_at}} </small><strong>by {{$post->user->name}}</strong> 
            </div>
        
        @endforeach
        <hr>
       {{$posts->links()}} 
    @else
    <p><strong>No Posts Found</strong> </p>
    @endif
@endsection