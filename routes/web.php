<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/mailable', function() {
   
    $comment = App\Comment::find(1);
    
    return new App\Mail\CommentProductMarkdown($comment);
});

Route::get('/dashboard', 'AdminController@index')->name('dashboard');

//Users
Route::resource('users', 'UserController');
//Roles
Route::resource('roles', 'RoleController')->except('show');
//Permissions
Route::resource('permissions', 'PermissionController')->except('show');
//Category
Route::resource('categories', 'CategoryController');
//TypeCategory
Route::resource('types', 'TypeCategoryController')->except('show');
//Products
Route::resource('products', 'ProductController');
Route::get('/products/tag/{id}', 'ProductTagController@index')->name('products.tag.index');
Route::resource('products.comments', 'ProductCommentController')->only(['store']);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
