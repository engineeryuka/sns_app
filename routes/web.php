<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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
Route::get('/', [PostController::class, 'index']);

Auth::routes();

// コメントアウト 岡本由
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
