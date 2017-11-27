<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Models\Category;
use App\Models\Post;
use \Conner\Tagging\Model\Tag;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * share categories
         */
        View::share('categories', Category::where('status', 1)->get());
        /**
         * share tags
         */
        View::share('tags', Tag::where('count', '>=', 1)->get());

        /**
         * bai viet xem nhieu
         */
        // Popular posts
        View::share('popularPosts', Post::where('status', '=', 1)->orderBy('view_count', 'desc')->limit(5)->get());
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
