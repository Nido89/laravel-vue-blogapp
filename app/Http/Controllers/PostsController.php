<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' =>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    
        //return Post::where('title','Post Two')->get();
        //$posts= Post::orderBy('title','desc')->get();
        $posts= Post::orderBy('created_at','desc')->paginate(3);
        return view('posts.index')->with('posts',$posts) ;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //returning the view or loading it
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation in laravel
        $this->validate($request,[
            'title' =>'required',
            'body' =>'required'
        ]);
        // Creating Posts for the Database
        $post = new Post;
        $post->title =$request->input('title');
        $post->body =$request->input('body');
        $post->user_id= auth()->user()->id;
        $post->save();

        //To redirect to back same page
        return redirect('/posts')->with('success','Post Created');
        }        
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$posts= Post::all();
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
        //return Post::where('title','Post Two')->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //First find the post that you would like to edit.
        //$posts= Post::all();
        $post = Post::find($id);

        // Check for correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error','Unauthorized Page');
        }


        return view('posts.edit')->with('post',$post);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         //validation in laravel
         $this->validate($request,[
            'title' =>'required',
            'body' =>'required'
        ]);
        // Creating Posts for the Database
        $post = Post::find($id);
        $post->title =$request->input('title');
        $post->body =$request->input('body');
        $post->save();

        //To redirect to back same page
        return redirect('/posts')->with('success','Post Updated Succesfully ');
                

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find the post first
        $post = Post::find($id);


          // Check for correct user
          if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error','Unauthorized Page');
        }
        $post->delete();
        return redirect('/posts')->with('success','Post Deleted Succesfully');
    }
}
