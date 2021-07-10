<?php

use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminMediaController;
use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostCommentRepliesController;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('front.home');
//Route::get('/', function (){
//   return view('');
//});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('front.home');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'App\Http\Controllers\HomeController@post']);
//Route::get('/post/{id}', [App\Http\Controllers\AdminPostsController::class, 'post'])->name('home.post');


Route::group(['middleware'=>'auth'], function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/admin/users', [AdminUsersController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/create', [AdminUsersController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users/store', [AdminUsersController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{user}/edit', [AdminUsersController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}/update', [AdminUsersController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}/destroy', [AdminUsersController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('admin/posts',[AdminPostsController::class, 'index'])->name('admin.posts');
    Route::get('/admin/posts/create', [AdminPostsController::class, 'create'])->name('admin.posts.create');
    Route::post('/admin/posts/store', [AdminPostsController::class, 'store'])->name('admin.posts.store');
    Route::get('/admin/posts/{post}/edit', [AdminPostsController::class, 'edit'])->name('admin.posts.edit');
    Route::put('/admin/posts/{post}/update', [AdminPostsController::class, 'update'])->name('admin.posts.update');
    Route::delete('/admin/posts/{post}/destroy', [AdminPostsController::class, 'destroy'])->name('admin.posts.destroy');

    Route::get('admin/categories',[AdminCategoriesController::class, 'index'])->name('admin.categories.index');
    Route::get('/admin/categories/create', [AdminCategoriesController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories/store', [AdminCategoriesController::class, 'store'])->name('admin.categories.store');
    Route::get('/admin/categories/{category}/edit', [AdminCategoriesController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/admin/categories/{category}/update', [AdminCategoriesController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/{category}/destroy', [AdminCategoriesController::class, 'destroy'])->name('admin.categories.destroy');

    Route::get('admin/media',[AdminMediaController::class, 'index'])->name('admin.media.index');
    Route::get('admin/media/create',[AdminMediaController::class, 'create'])->name('admin.media.create');
    Route::post('admin/media/store',[AdminMediaController::class, 'store'])->name('admin.media.store');
    Route::delete('/admin/media/{photo}/destroy', [AdminMediaController::class, 'destroy'])->name('admin.media.destroy');
    Route::delete('admin/delete/media', [AdminMediaController::class, 'deleteMedia'])->name('delete.media');

    Route::get('admin/comments',[PostCommentController::class, 'index'])->name('admin.comments.index');
    Route::get('admin/comments/{comment}',[PostCommentController::class, 'show'])->name('admin.comments.show');
    Route::post('admin/comments',[PostCommentController::class, 'store'])->name('admin.comments.store');
    Route::put('admin/comments/{comment}/update',[PostCommentController::class, 'update'])->name('admin.comments.update');
    Route::delete('admin/comments/{comment}/destroy',[PostCommentController::class, 'destroy'])->name('admin.comments.destroy');

    Route::get('admin/comment/replies',[PostCommentRepliesController::class, 'index'])->name('admin.comment.replies');
    Route::get('admin/comment/replies/{reply}',[PostCommentRepliesController::class, 'show'])->name('admin.comment.replies.show');
    Route::post('admin/comment/replies/create',[PostCommentRepliesController::class, 'createReply'])->name('admin.comment.replies.create');
    Route::put('admin/comments/replies/{reply}/update',[PostCommentRepliesController::class, 'update'])->name('admin.comments.replies.update');
    Route::delete('admin/comments/replies/{reply}/destroy',[PostCommentRepliesController::class, 'destroy'])->name('admin.comments.replies.destroy');
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});



