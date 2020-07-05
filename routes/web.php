<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('frontend.home',['title'=>"Home page"]);
// })->name('homepage');

Route::get('/', 'FrontendController@index')->name('homepage');


Route::get('/admin',function (){
    return view("admin.home");
})->middleware('auth')->name('admin');

Route::get('/logout', function (){
    Auth::logout();
    return redirect()->route('homepage');
});

Auth::routes();



/*====== Post route ====== */
 
Route::post('/addpost','Post@addPost')->middleware('auth');
Route::get('/postlist','Post@postList')->middleware('auth');

/*====== Post route ====== */

//Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
