<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Datatables;
use App\Models\Post;
use Validator;
use App\Http\Requests\StoreBlogPost;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.post.index');
    }

    /**
     * display json list post
     * @return json ( datatables )
     */
    public function jsonListPost(){
        $posts = Post::all();

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {   

        $data = $request->except(['_token', 'tags']);
        $data['user_id'] = Auth::id();

        // crate slug post
        // 18/03/1997 my birthday
        $data['slug'] = str_slug($data['title'])
                        .'-'
                        .(time() - strtotime(date('1997-03-18 12:00:00')))
                        .'.html';

        $post = Post::create($data);
        return redirect( route('admin.posts.edit', $post->id) );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id', $id)->first();

        return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBlogPost $request, $id)
    {
        $data = $request->except(['_token', 'tags', '_method']);
        $data['user_id'] = Auth::id();

        Post::where('id', $id)->update($data);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id', $id)->delete();

        return redirect()->back();
    }

    // public function destroyAjax(Request $request)
    // {
    //     Post::where('id', $request->input('id'))->delete();
    //     // ->update([
    //     //     'is_trash' => 1,
    //     //     'status'   => 0
    //     // ]);
    //     return redirect()->back();
    // }
}
