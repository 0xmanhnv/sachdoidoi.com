<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('blog.index');
});

/**
 * admin auth
 * ** admin/login | admin/logout
 */
Route::get('admin/login', 'Admin\Auth\LoginController@showLoginForm');
Route::post('admin/login', 'Admin\Auth\LoginController@login');
Route::get('admin/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');

/**
 * /admin
 */
Route::prefix('admin')->middleware('admin.login')->group(function(){
	Route::get('/', 'Admin\DashboardController@dashboard')->name('admin.dashboard');
	Route::get('dashboard', 'Admin\DashboardController@dashboard');

	/**
	 * admin/recycle-bin
	 */
	Route::prefix('recycle-bin')->group(function(){
		/**
		 * admin/recycle-bin/posts
		 */
		Route::prefix('posts')->group(function(){
			Route::get('/', 'Admin\RecycleBinController@posts')->name('admin.recycleBin.posts');
			Route::get('json/list-post', 'Admin\RecycleBinController@jsonListPost')->name('admin.recycleBin.posts.json.listPost');
			// admin/recycle-bin/undo
			Route::put('undo', 'Admin\RecycleBinController@undoPost')->name('admin.recycleBin.posts.undoPost');
			Route::delete('delete', 'Admin\RecycleBinController@deleteForeverPost')->name('admin.recycleBin.posts.delete');
		});

		/**
		 * admin/recycle-bin/categories
		 */
	});


	/**
	 * admin/posts
	 */
	Route::prefix('posts')->group(function(){
		Route::get('json/list-post', 'Admin\PostController@jsonListPost')
		->name('admin.posts.json.list');
	});
	Route::resource('posts', 'Admin\PostController', ['names' => [
	    'create' 	=> 'admin.posts.create',
	    'store' 	=> 'admin.posts.store',
	    'edit'		=> 'admin.posts.edit',
	    'index'		=> 'admin.posts.index',
	    'destroy'	=> 'admin.posts.destroy',
	    'update'	=> 'admin.posts.update'	
	]]);

	/**
	 * admin/categories
	 */
	Route::prefix('categories')->group(function(){
		Route::get('json/list-category', 'Admin\CategoryController@jsonListCategory')->name('admin.categories.json.list');
		Route::get('{id_category}/json/list-post', 'Admin\CategoryController@jsonListPost')->name('admin.categories.json.posts');
	});
	Route::resource('categories', 'Admin\CategoryController', ['names' => [
		'index'		=> 'admin.categories.index',
		'destroy' 	=> 'admin.categories.destroy',
		'show'		=>	'admin.categories.show'
	]]);
	/**
	 * admin/users
	 */
	Route::get('users/json/list-user', 'Admin\UserController@jsonListUser')
		->name('admin.users.json.listUser');
	Route::resource('users', 'Admin\UserController', ['names' => [
		'index' => 'admin.users.index',
	]]);
});

/**
 * /blog
 */
Route::group(['prefix' => 'blog'], function(){
	Route::get('/', 'Blog\BlogController@index')->name('blog.index');
	/**
	 * search
	 */
	Route::get('/search', 'Blog\BlogController@showResultSearch')->name('blog.search');

	// Route::get('post/{slug}/{id}', 'Blog\BlogController@showDetailPost')->name('blog.post');
	// Route::get('category/{id}/{slug}', 'Blog\BlogController@showDetailCategory')->name('blog.category');

	// Route::get('tag/{id}/{slug}', 'Blog\BlogController@showDetailTag');

	// Route::get('author/{id}', 'Blog\BlogController@showDetailAuthor')->name('blog.author');


	/**
	 * blog/posts
	 */
	Route::get('posts', 'Blog\BlogController@posts');
	Route::prefix('/')->group(function(){
		// Route::get('/', 'Blog\PostController@index')->name('blog.post.index');
		Route::get('{slug}', 'Blog\PostController@detail')->name('blog.post.detail');
	});

	/**
	 * blog/category
	 */
	Route::get('categories', 'Blog\BlogController@categories');
	Route::prefix('category')->group(function(){
		// Route::get('/', 'Blog\CategoryController@index');
		Route::get('{id}/{slug}', 'Blog\CategoryController@detail')->name('blog.category.detail');
	});
});

/**
 * users
 */
Route::get('users', 'UserController@users');
Route::get('profile', 'UserController@profile')->name('user.profile');
Route::prefix('user')->group(function(){
	Route::get('{id}', 'UserController@profile')->name('user.detail');
});


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
