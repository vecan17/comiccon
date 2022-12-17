<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\PHPMailerController;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Models\Category;

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

Route::get('/','LandingPageController@index');
Route::get('/posts','PostController@posts');
Route::get('/post/{slug}','PostController@singlePost');
Route::get('/players','PlayerPageController@players');
Route::get('/player/{slug}','PlayerPageController@singlePlayer');
Route::get('/teams','TeamPageController@teams');
Route::get('/team/{slug}','TeamPageController@singleTeam');
Route::get('/tournaments','TournamentPageController@tournaments');
Route::get('/tournament/{slug}','TournamentPageController@singleTournament');
Route::get('/page/{slug}','CustomPageController@index');
Route::get('/streams','StreamPageController@streams');
Route::get('/stream/{slug}','StreamPageController@singleStream');

//Carrusel
//Route::get('Carrusel','CarruselController@index');
//Route::get('Game','GameController@index');

Route::get("email", [PHPMailerController::class, "email"])->name("email");
Route::post("send-email", [PHPMailerController::class, "composeEmail"])->name("send-email");


// for updates
Route::get('/update/{version}','UpdateController@update');

// for localization
Route::get('/locale/{locale}',function($locale){
    $languages=explode(',', env('LANGUAGES','en'));

    if (! in_array($locale, $languages)) {
        abort(400);
    }

    session()->put('locale',$locale);

    return response()->json(['message'=>'Language changed'],200);
})->name('lang');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
