<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\WithdrawalController;

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

// 変更 岡本由 functionをPostControllerへ移動
// Route::get('/', function () {

//     $posts = [
//         [
//             'user' => 'ユーザー3',
//             'created_at' => '2022-08-13 16:51',
//             'body' => 'ユーザー3の初投稿です！',
//         ],
//         [
//             'user' => 'ユーザー2',
//             'created_at' => '2022-08-13 16:42',
//             'body' => 'ユーザー2の初投稿です！',
//         ],
//         [
//             'user' => 'ユーザー1',
//             'created_at' => '2022-08-13 16:38',
//             'body' => 'ユーザー1の初投稿です！',
//         ],
//     ];

//     return view('index')
//         ->with(['posts' => $posts]);
// });
// PostControllerのindexメソッドを呼び出す
Route::get('/', [PostController::class, 'index'])
    ->name('index');

Auth::routes();

// コメントアウト 岡本由
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/create', [PostController::class, 'create'])
    ->name('posts.create');

Route::get('/show', [PostController::class, 'show'])
    ->name('posts.show')
    ->middleware('auth');       //ログイン済みでない場合、ログイン画面を表示

Route::get('/{post}/edit', [PostController::class, 'edit'])
    ->name('posts.edit')
    ->where('post', '[0-9]+')
    ->middleware('auth');       //ログイン済みでない場合、ログイン画面を表示
Route::patch('/{post}/update', [PostController::class, 'update'])
    ->name('posts.update')
    ->where('post', '[0-9]+');

Route::get('/{post}/detail', [PostController::class, 'detail'])
    ->name('posts.detail')
    ->where('post', '[0-9]+')
    ->middleware('auth');       //ログイン済みでない場合、ログイン画面を表示

Route::delete('/{post}/destroy', [PostController::class, 'destroy'])
    ->name('posts.destroy')
    ->middleware('auth');       //ログイン済みでない場合、ログイン画面を表示

Route::post('/{post}/comments', [CommentController::class, 'create'])
    ->name('comments.create')
    ->where('post', '[0-9]+');

Route::delete('/withdrawal', [WithdrawalController::class, 'withdrawal'])
    ->name('withdrawal')
    ->middleware('auth');       //ログイン済みでない場合、ログイン画面を表示
