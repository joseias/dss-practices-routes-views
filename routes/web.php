<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    // echo $(curl --location --request GET 'http://127.0.0.1:8000')
    return "GET-> /";
});


Route::post('foo/bar', function () {
    // echo $(curl --location --request POST 'http://127.0.0.1:8000/foo/bar' --header 'Content-Type: application/json')
    return "POST-> foo/bar";
});


Route::post('foo/post/request/{id}', function (Request $request, $id) {
    // echo $(curl --location --request POST 'http://127.0.0.1:8000/foo/post/request' --header 'Content-Type: application/json')

    $documents = implode(',', $request->get('documents'));
    return "POST-> foo/post/request/$id => $documents";
});


Route::get('user/parameter/{id}', function ($id) {
    //echo $(curl --location --request GET 'http://127.0.0.1:8000/user/parameter/jane')
    return "GET-> user/parameter/$id";
});


Route::get('foo/user/parameter/{id1}/{id2}', function ($id1, $id2) {
    //echo $(curl --location --request GET 'http://127.0.0.1:8000/foo/user/parameter/jane/doe')
    return "GET->  foo/user/parameter/$id1/$id2";
});


Route::post('foo/user/parameter/{id}', function ($id) {
    //echo $(curl --location --request POST 'http://127.0.0.1:8000/foo/user/parameter/jane' --header 'Content-Type: application/json')
    return "POST->  foo/user/parameter/$id";
});


Route::get('user/optional/{name?}', function ($name = 'John') {
    //echo $(curl --location --request GET 'http://127.0.0.1:8000/user/optional')
    //echo $(curl --location --request GET 'http://127.0.0.1:8000/user/optional/Jane')

    return "GET-> user/optional/$name";
});


Route::get('user/optional/{name?}/{surname?}/', function ($name = 'John', $surname = 'Doe') {
    //echo $(curl --location --request GET 'http://127.0.0.1:8000/user/optional')
    //echo $(curl --location --request GET 'http://127.0.0.1:8000/user/optional/Jane')

    return "GET-> user/optional/$name/$surname";
});


# named route
Route::get('user/named/{id}', function ($id) {
    return "GET-> user/named/$id";
})->name('user.show');


Route::get('user/test', function () {
    //echo $(curl --location --request GET 'http://127.0.0.1:8000/user/test')

    $url = route('user.show', ['id' => 'Jane']);

    return redirect($url);
});



Route::get('home/', function () {

    return view('home', ['name' => 'Jane']);
});


Route::get('user/profile/{id}', function ($id) {

    // Eloquent, aun no vemos controladores
    $user = App\Models\User::find($id); // Cargar usuario a partir de $id,

    return view('user.profile', ['user' => $user]);
});