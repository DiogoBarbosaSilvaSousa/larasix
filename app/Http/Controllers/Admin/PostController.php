<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\CategoryPost;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Post;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $titulo = $request->get('titulo');

        if(!empty($titulo)) {
            $posts = Post::where('title','like',"%".$request->get('titulo')."%")->paginate(3);
        } else {
            $posts = Post::paginate(3);
        }


        $message = $request->session()->get('message');

        return view('admin.posts.index',['posts' => $posts, 'message' => $message]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create',['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {

        $post = new Post();

        //Arquivo armazenado e local onde o arquivo foi armazenado
        $path = $request->file('imagem')->store('public/images');
        //Troco o public por storage para corresponder corretamente ao link simbólico
        $pathLink = Str::replaceFirst('public','storage',$path);

        $post->title = $request->post('title');
        $post->content = $request->post('content');
        $post->thumbnail = $pathLink;
        $post->user_id = Auth::id();

        $post->save();

        $categoryPost = new CategoryPost();
        $categoryPost->post_id = $post->id;
        $categoryPost->category_id = $request->post('category');

        $categoryPost->save();

        $request->session()->flash('message',"Postagem $post->id adicionada com sucesso ");

        return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Post $post
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, Request $request)
    {
        $post::destroy($post->id);
        $request->session()->flash('message',"Postagem $post->id removida com sucesso ");
        return redirect()->route('posts.index');
    }
}
