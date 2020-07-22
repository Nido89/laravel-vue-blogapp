@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-light text-dark">
                <div class="card-header text-light bg-dark">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <a href="/lsapp/public/posts/create" class="btn btn-primary mb-2">Create Post</a>
                  <h3>Your Blog Posts</h3>
                  @if (count($posts) >0)
                      
                  
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th>Writer</th>
                            <th>Created at</th>
                            <th>Option1</th>
                            <th>Option2</th>
                        </tr>
                        @foreach ($posts as $post)
                        <tr>
                        <td>{{$post->title}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->created_at}}</td>
                        <td><a href="/lsapp/public/posts/{{$post->id}}/edit" class="btn btn-warning">Edit</a></td>
                            <td>
                                {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'DELETE','class' =>'pull-right']) !!}

    
    {{Form::submit('Delete',['class' =>'btn btn-danger'])}}
    {!!Form::close()!!}


                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @else 
                    <p>You have no posts at all</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
