<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index');
    }

    public function jsonListCategory(){

        $categories = Category::all();


        return Datatables($categories)
            ->addColumn('action', function ($category) {
                return '       
                    <a href="'.route('admin.categories.show', $category->id).'" class="btn btn-xs btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    <a href="categories/'.$category->id.'/edit" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i></a>
                    <form action="categories/'.$category->id.'" method="post" style="display: inline-block;">
                      <input type="hidden" name="_token" value="'.csrf_token().'">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="id" value="'.$category->id.'">
                      <button type="button" class="btn btn-xs btn-danger delete-category"><i class="glyphicon glyphicon-remove"></i></button>
                    </form>
                    ';
            })
            ->make(true);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.category.posts', [
            'category_id' => $id
        ]);
    }

    public function jsonListPost($category_id){
        $posts = Post::where('category_id', $category_id)->get();

        return Datatables($posts)
            ->addColumn('action', function ($post) {
                return '       
                    <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#detail-post-'.$post->id.'"><i class="fa fa-eye" aria-hidden="true"></i></button>
                      <!-- Modal -->
                      <div id="detail-post-'.$post->id.'" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header bg-info text-center">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h3 class="modal-title"><strong>'. $post->title .'</strong></h3>
                            </div>
                            <div class="modal-body">
                              <img src="'.$post->thumbnail.'" alt="" style="max-width: 100%;">
                              <p>'.$post->content.'</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default btn-circle" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    <a href="posts/'.$post->id.'/edit" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i></a>
                    <form action="posts/'.$post->id.'" method="post" style="display: inline-block;">
                      <input type="hidden" name="_token" value="'.csrf_token().'">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="id" value="'.$post->id.'">
                      <button type="button" class="btn btn-xs btn-danger delete-post"><i class="glyphicon glyphicon-remove"></i></button>
                    </form>
                    ';
            })
            ->editColumn('is_featured', '{{ $is_featured == 1 ? "featured" : "" }}' )
            ->editColumn('status', '{{ $status == 1 ? "public" : "private" }}' )
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        if($id == 1){
            return redirect()->back()->withErrors();
        }

        Post::where('category_id', $id)->update(['category_id' => 1]);
        Category::where('parent_id', $id)->update(['parent_id' => null]);
        Category::where('id', $id)->delete();

        return redirect()->back();
    }
}
