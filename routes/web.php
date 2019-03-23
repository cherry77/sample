<?php

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
//1.基本路由
Route::get('/', function () {
    return view('welcome');
});
//Route::get('base', function () {
//    return "hello world";
//});
//Route::match(['get','post'],'multy1',function(){
//    return "multy1";
//});
//Route::any('multy2',function(){
//    return 'multy2';
//});
////2.传参路由
//Route::get('user/{id}',function($id){
//    return 'User-id-'.$id;
//})->where('id','[0-9]+');

//3.可以不传值
//Route::get('user/{name?}',function($name = null){
//    return 'User-name-'.$name;
//});

//传默认值
//Route::get('user/{name?}',function($name = "sea"){
//    return 'USer-name-'.$name;
//});

//4.通过where来限制传值的格式
//Route::get('user/{name?}',function($name = "kitty"){
//    return 'USer-name-'.$name;
//})->where('name','[A-Za-z]+');

//传多个参数
//Route::get('user/{id}/{name?}',function($id,$name = "summer"){
//    return 'User-id-'.$id.'-name-'.$name;
//})->where(['id' => '[0-9]+','name' => '[A-Za-z]+']);

//5.路由别名-可以在控制器、模板中简化用route('center'),而不需要用route('user/center')
//Route::get('user/center',['as' => 'center',function(){
//    return route('center');
//}]);

//6.路由群组
//Route::group(['prefix' => 'member'],function(){
//
//    Route::any('multy2',function(){
//        return 'member-multy2';
//    });
//
//    Route::get('user/center',['as' => 'center',function(){
//        return route('center');
//    }]);
//});
//7.路由中输出视图
//Route::get('view',function(){
//    return view('welcome');//welcome为模板名字
//});
//Route::get('user/info','UserController@info');
//Route::get('user/{id}','UserController@info')->where('id', '[0-9]+');

Route::any('test1',['uses' => 'StudentController@test1']);
Route::any('orm1',['uses' => 'StudentController@orm1']);
Route::any('orm2',['uses' => 'StudentController@orm2']);
Route::any('orm3',['uses' => 'StudentController@orm3']);
Route::any('orm4',['uses' => 'StudentController@orm4']);

Route::any('section1',['uses' => 'StudentController@section1']);

Route::any('url_name',['as' => 'url','uses' => 'StudentController@urlTest']);