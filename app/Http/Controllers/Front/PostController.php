<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $title = $request->get('title');
        $content = $request->get('content');
        $category = $request->get('category');
        $author = $request->get('author');

        if(!empty($title) || !empty($content) || !empty($category) || !empty($author)) {

            $posts = DB::table('posts')
                ->leftJoin('users','posts.user_id','=','users.id')
                ->leftJoin('category_post','posts.id','=','category_post.post_id')
                ->leftJoin('categories','categories.id','=','category_post.category_id')
                ->where('posts.title','like',"%".$title."%")
                ->where('posts.content','like',"%".$content."%")
                ->where('categories.name','like',"%".$category."%")
                ->where('users.name','like',"%".$author."%")
                ->select('posts.id as id',
                    'posts.title as title',
                    'posts.content as content',
                    'posts.thumbnail as thumbnail',
                    'categories.name as category',
                    'users.name as author',
                    'posts.created_at as created_at',
                    'posts.updated_at as updated_at')
                ->paginate(4);

        } else {

            $posts = DB::table('posts')
                ->leftJoin('users','posts.user_id','=','users.id')
                ->leftJoin('category_post','posts.id','=','category_post.post_id')
                ->leftJoin('categories','categories.id','=','category_post.category_id')
                ->select('posts.id as id',
                                 'posts.title as title',
                                 'posts.content as content',
                                 'posts.thumbnail as thumbnail',
                                 'categories.name as category',
                                 'users.name as author',
                                 'posts.created_at as created_at',
                                 'posts.updated_at as updated_at')
                ->paginate(4);


        }

        return response()->json($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $posts = DB::table('posts')
            ->leftJoin('users','posts.user_id','=','users.id')
            ->leftJoin('category_post','posts.id','=','category_post.post_id')
            ->leftJoin('categories','categories.id','=','category_post.category_id')
            ->select('posts.id as id',
                'posts.title as title',
                'posts.content as content',
                'posts.thumbnail as thumbnail',
                'categories.name as category',
                'users.name as author',
                'posts.created_at as created_at',
                'posts.updated_at as updated_at')
            ->where('posts.id',$post->id)->get();

         return response()->json($posts);

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
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
