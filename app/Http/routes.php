<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', [
  'as' => 'home',
  'uses' => 'IndexController@index',
]);

Route::get('search', [
  'as' => 'search',
  'uses' => 'IndexController@search',
]);

Route::group(['prefix' => 'login/visitorsuser'], function () {

  Route::get('{visitor}/redirect', [
    'as' => 'visitor.redirect',
    'uses' => 'Auth\AuthController@getVisitorAuth',
  ]);

  Route::get('{visitor}/callback', [
    'as' => 'visitor.callback',
    'uses' => 'Auth\AuthController@getVisitorAuthCallback',
  ]);

  Route::post('anonymous', [
    'as' => 'visitor.anonymous',
    'uses' => 'Auth\AuthController@getAnonymous',
  ]);

});

Route::group(['prefix' => 'backstage'], function () {

  Route::post('/login', [
    'as' => 'backstage.login',
    'uses' => 'AdminController@login',
  ]);

  Route::get('/', [
    'as' => 'backstage',
    'uses' => 'AdminController@index',
  ]);

  Route::get('article/garbage',[
    'as' => 'article.garbage',
    'uses' => 'ArticleController@garbage',
  ]);

  Route::get('article/recovery/{id}',[
    'as' => 'article.recovery',
    'uses' => 'ArticleController@recovery',
  ]);

  Route::get('article/forcedelete/{id}',[
    'as' => 'article.forcedelete',
    'uses' => 'ArticleController@forceDelete',
  ]);

});

Route::resource('article', 'ArticleController');
Route::resource('categorie', 'CategorieController');
Route::resource('tag', 'TagController');
Route::resource('message', 'MessageController');
Route::resource('message.commit', 'MessageController', ['only' => ['store', 'destroy']]);
