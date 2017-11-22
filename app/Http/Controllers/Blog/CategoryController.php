<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('status', '=', 1)->paginate(15);

        // dd($categories);
        return view('blog.categories.index');
    }

    public function detail($id, $slug){
        
        $category = Category::where(
                    'id', '=', $id,
                    'and',
                    'slug', '=', $slug,
                    'and',
                    'status', '=', 1
                    )
                    ->with(['posts' => function($queryPosts){
                        $queryPosts->with(['author' => function($queryAuthor){
                            $queryAuthor->select('id','name');
                        }]);
                    }])
                    ->get()
                    ->first();

        return view('blog.category.detail', [
            'posts' => $category->posts,
            'category' => $category
        ]);
    }
}
