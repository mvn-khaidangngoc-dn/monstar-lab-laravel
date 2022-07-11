<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    // public function __construct()
    // {
    //     $this->authorizeResource(Post::class);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::user());
        if (Auth::user()->cannot('viewAny', Post::class)) {
            abort(403);
        }else {
            $posts = Post::get();
            return view('posts.index',compact('posts'));
        }
        // $user = Auth::user()->id; // user->role = 2 || 3;
        // dd($user);
        // if (Gate::allows('show-post', $user)) {
        //    return "You Can See All List Posts";
        // } else {
        //     return "You Can''t See All List Posts";
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->cannot('create', Post::class)) {
            abort(403);
        }else {
            return view('posts.create');
        }

        //$user = User::findOrFail(Auth::user()->id); // user->role = 1 || 3;
        // dd($user);
        // if (Gate::allows('create-post',$user)) {
        //    return "You Can Create Posts";
        // } else {
        //     return "You Can't Create Posts";
        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.detail',compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit',compact($post));

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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.list')->with('success','Xóa Post thành công!!!');
    }
}
