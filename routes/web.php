<?php

use Illuminate\Support\Facades\Route;
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
//     return view('welcome');
// });

Route::get('/', 'DefaultController@index')->name('homepage');
Route::get('/prochod', 'DefaultController@index')->name('homepageone');
Route::get('/defoultnews/{news}', 'DefaultController@show')->name('defoultnews.show');
Route::get('/catagory/{news}', 'DefaultController@catagoryshow')->name('catagory.catagoryshow');


Route::get('/picall/{pics}', 'DefaultController@picall')->name('default.picall');
Route::post('/picall', 'DefaultController@picsearch')->name('default.picsearch');
Route::get('/picall/search/{date}', 'DefaultController@getpicsearch')->name('default.getpicsearch');

Route::get('/commonpicall/{pics}', 'DefaultController@commonpicall')->name('default.commonpicall');
Route::post('/commonpicall', 'DefaultController@commonpicsearch')->name('default.commonpicsearch');
Route::get('/commonpicall/search/{date}', 'DefaultController@commongetpicsearch')->name('default.commongetpicsearch');

Route::get('/archive', 'DefaultController@archive')->name('default.archive');
Route::post('/archive/search', 'DefaultController@archivesearch')->name('default.archivesearch');
Route::get('/archive/search/{date}', 'DefaultController@archivesearchget')->name('default.getsearch');

Route::post('/normalsearch', 'DefaultController@normalsearch')->name('default.normalsearch');
Route::get('/normalsearch/{normalsearch}', 'DefaultController@normalsearchget')->name('default.getnormalsearch');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Menu rout

Route::get('/mainmenus/create', 'MainmenuController@create')->name('mainmenus.create');
Route::get('/mainmenus/index', 'MainmenuController@index')->name('mainmenus.index');

Route::post('/mainmenus', 'MainmenuController@store')->name('mainmenus.store');
Route::delete('/mainmenus/{mainmenu}', 'MainmenuController@destroy')->name('mainmenus.destroy');

Route::get('/mainmenus/{mainmenu}/edit', 'MainmenuController@edit')->name('mainmenus.edit');

Route::put('/mainmenus/{mainmenu}', 'MainmenuController@update')->name('mainmenus.update');

Route::put('/dismainmenus/{mainmenu}', 'MainmenuController@display')->name('mainmenus.display');
Route::patch('/mainmenus/{mainmenu}', 'MainmenuController@hidden')->name('mainmenus.hidden');

//News Rout
Route::get('/news/index', 'NewsController@index')->name('news.index');
Route::get('/news/create', 'NewsController@create')->name('news.create');
Route::post('/news', 'NewsController@store')->name('news.store');
Route::get('/news/{news}', 'NewsController@show')->name('news.show');
Route::get('/news/{news}/edit', 'NewsController@edit')->name('news.edit');
Route::put('/news/{news}', 'NewsController@update')->name('news.update');
Route::delete('/news/{news}', 'NewsController@destroy')->name('news.destroy');

Route::put('/disheadline/{news}', 'NewsController@display')->name('news.display');
Route::patch('/minuesheadline/{news}', 'NewsController@hidden')->name('news.hidden');


Route::post('/news/search', 'NewsController@newssearch')->name('news.newssearch');
Route::get('/news/search/{search}', 'NewsController@newssearchget')->name('news.getnewssearch');


// Picture Rout
Route::get('/picture/index', 'PictureController@index')->name('picture.index');
Route::get('/picture/create', 'PictureController@create')->name('picture.create');
Route::post('/picture', 'PictureController@store')->name('picture.store');
Route::get('/picture/{picture}/edit', 'PictureController@edit')->name('picture.edit');
Route::put('/picture/{picture}', 'PictureController@update')->name('picture.update');
Route::delete('/picture/{picture}', 'PictureController@destroy')->name('picture.destroy');

Route::post('/picture/search', 'PictureController@picsearch')->name('picture.newssearch');
Route::get('/picture/search/{search}', 'PictureController@picsearchget')->name('picture.getnewssearch');

Route::post('/picture/date', 'PictureController@picdate')->name('picture.picdate');
Route::get('/picture/date/{date}', 'PictureController@picdateget')->name('picture.picdateget');


// Common Picture

Route::get('/Commonpicture/index', 'CommonPicController@index')->name('Commonpicture.index');
Route::get('/Commonpicture/create', 'CommonPicController@create')->name('Commonpicture.create');
Route::post('/Commonpicture', 'CommonPicController@store')->name('Commonpicture.store');
Route::get('/Commonpicture/{picture}/edit', 'CommonPicController@edit')->name('Commonpicture.edit');
Route::put('/Commonpicture/{picture}', 'CommonPicController@update')->name('Commonpicture.update');
Route::delete('/Commonpicture/{commonPic}', 'CommonPicController@destroy')->name('Commonpicture.destroy');

Route::post('/Commonpicture/search', 'CommonPicController@picsearch')->name('Commonpicture.newssearch');
Route::get('/Commonpicture/search/{search}', 'CommonPicController@picsearchget')->name('Commonpicture.getnewssearch');

Route::post('/Commonpicture/date', 'CommonPicController@picdate')->name('Commonpicture.picdate');
Route::get('/Commonpicture/date/{date}', 'CommonPicController@picdateget')->name('Commonpicture.picdateget');


// Addvertisment
Route::get('/addvertisment/index', 'AddController@index')->name('addvertisment.index');
Route::get('/addvertisment/create', 'AddController@create')->name('addvertisment.create');
Route::post('/addvertisment', 'AddController@store')->name('addvertisment.store');
Route::get('/addvertisment/{add}/edit', 'AddController@edit')->name('addvertisment.edit');
Route::put('/addvertisment/{add}', 'AddController@update')->name('addvertisment.update');
Route::delete('/addvertisment/{add}', 'AddController@destroy')->name('addvertisment.destroy');


//User
Route::get('/user/index', 'UserController@index')->name('user.index');
Route::get('/user/create', 'UserController@create')->name('user.create');
Route::post('/user', 'UserController@store')->name('user.store');
Route::get('/user/{user}/edit', 'UserController@edit')->name('user.edit');
Route::put('/user/{user}', 'UserController@update')->name('user.update');
Route::delete('/user/{user}', 'UserController@destroy')->name('user.destroy');

Route::put('/disable/{user}', 'UserController@disable')->name('user.disable');
Route::patch('/active/{user}', 'UserController@active')->name('user.active');
Route::get('/user/normaluser', 'UserController@normaluser')->name('user.normaluser');

Route::get('/user/profile', 'UserController@profile')->name('user.profile');



//Save

Route::get('/save/index', 'SaveController@index')->name('save.index');
Route::post('/save', 'SaveController@store')->name('save.store');
Route::delete('/save/{save}', 'SaveController@destroy')->name('save.destroy');
