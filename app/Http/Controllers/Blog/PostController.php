<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * get post is_trash != 1
         * join category _id
         * @var [type]
         */
        $posts = Post::where('status', '==', 1)->paginate(10);    
        
        return view('blog.index',[
            'posts' => $posts,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($slug)
    {
        $post = Post::where( 
                'slug', '=', $slug
                )
                ->get()
                ->first();
        
        // dd($id);
        return view('blog.post.detail',[
            'post' => $post,
        ]);
    }

}
