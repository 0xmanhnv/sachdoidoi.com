<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    	'title', 'thumbnail', 'description', 'content', 'user_id', 'category_id', 'slug', 'status'
    ];

    public function author(){
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function tags(){
    	return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
   	}

    public function category(){
      return $this->belongsTo('App\Models\Category', 'category_id');
    }

   	public static function add($data){
   		$post = Post::create($data);
   	}

   	public static function destroy($id){
   		Post::where('id', $id)->update([
   			'status' => 0,
   		]);
   	}
}
