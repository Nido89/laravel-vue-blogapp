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
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                    <img style="width: 100%"src="http://localhost/lsapp/storage/app/public/cover_images/{{$post->cover_image}}">
                    </div>
            

                    <div class="col-md-8 col-sm-8">
                        <h4><a class="text-white" href="./posts/{{$post->id}}"> {{$post->title}}</a></h4>
                        <small >Written on {{$post->created_at}} </small><strong class="text-warning">by {{$post->user->name}}</strong>
                    </div>
                </div>
 
            </div>
        
        @endforeach
        <hr>
       {{$posts->links()}} 
    @else
    <p><strong>No Posts Found</strong> </p>
    @endif
@endsection