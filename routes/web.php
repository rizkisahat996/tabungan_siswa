<?php

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardNabungController;
use App\Http\Controllers\DashboardTabunganController;
use App\Http\Controllers\BeritaController;


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
    return view('home', [
        "title" => "Home",
    ]);
});

Route::get('/categories', function(){
    return view('categories', [
        "title" => "Post Categories",
        "categories" => Category::all()
    ]);
});

Route::get('/posts', [PostController::class, 'index']);


//halaman single post
Route::get('posts/{post:slug}', [PostController::class, 'show']);



// Route::get('/categories/{category:slug}', function(Category $category)
// {
//     return view('posts', [
//         'title' => "Post by Category : $category->name",
//         'posts' => $category->post->load('author', 'category')
//     ]);
// });

// Route::get('/authors/{author:username}', function(User $author){
//     return view('posts', [
//         'title' => "Post By Author : $author->name",
//         'active' => 'posts',
//         'posts' => $author->post->load('category', 'author'),
//     ]);
// });


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');


Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/requestnabung', DashboardNabungController::class)->middleware('auth');
Route::resource('/dashboard/tabungan', DashboardTabunganController::class)->middleware('auth');
Route::get('/dashboard/adminnabung/{id}', [DashboardTabunganController::class, 'adminnabung'])->middleware('auth');
Route::get('/dashboard/detailsiswa/{id}', [DashboardTabunganController::class, 'detailsiswa'])->middleware('auth');
Route::get('/dashboard/createsiswa', [DashboardTabunganController::class, 'createsiswa'])->middleware('auth');
Route::post('/dashboard/addsiswa', [DashboardTabunganController::class, 'siswaStore'])->middleware('auth');
Route::put('/dashboard/updatesiswa/{id}', [DashboardTabunganController::class, 'siswaupdate'])->middleware('auth');




Route::resource('/berita', BeritaController::class);

Route::get('/a', function(){
    return view('berita.post');
});


//work  
Route::get('/b', function(){
    return view('berita.dashboard.index');
});