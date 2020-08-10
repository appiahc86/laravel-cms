<?php

use App\Http\Controllers\Blog\PostsController;
use App\User;

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

Route::get('/', 'WelcomeController@index')->name('welcome');

//Auth::routes();


if (User::where("role","=", "admin")->exists())
{
    Auth::routes([
        'register' => false
    ]);

}
else
{
    Auth::routes();
}



Route::get('/home', 'HomeController@index')->name('home');

Route::get('blog/post/{post}', [PostsController::class, 'show'])->name('blog.show');
Route::get('blog/categories/{category}', [PostsController::class, 'category'])->name('blog.category');
Route::get('blog/tags/{tag}', [PostsController::class, 'tag'])->name('blog.tag');

// Auth middleware group
Route::group(['middleware'=>'auth'], function(){

    Route::resource('categories', 'CategoriesController');
    Route::resource('tags', 'TagsController');
    Route::resource('posts', 'PostsController');
    Route::get('trashed-post', [ 'as'=>'trashed.index', 'uses'=>'PostsController@trashed']);
    Route::put('restore/{id}', 'PostsController@restore')->name('restore-post');

});


Route::group(['middleware'=> ['auth', 'admin']], function (){

    Route::resource('users', 'UsersController');
    Route::put('user-role/{user}', 'UsersController@role')->name('user.role');
    Route::get('user/profile', 'UsersController@editUser')->name('user.edit-profile');

});




