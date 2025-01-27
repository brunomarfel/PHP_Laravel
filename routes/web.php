<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
}) ->name('welcome');

//Registrar rota, chamar função e retornar ação
Route::get('/hello', function() {
     return '<h1>Olá, FrontEnd!</h1>';
}) ->name('hello');

//Rota com parametro
Route::get('/hello/{name}', function($name) {
    return '<h1>Olá '.$name.'</h1>';
});

//home 1 nome do brwoser, 2 nome ficheiro dentro da view, 3 nome da rota
Route::get('/home', function() {
    return view('view_home');
}) ->name('home');

Route::get('/users', function() {
    return view('users.all_users');
}) ->name('users.all');


//Exercício

Route::get('/newusers', function() {
    return view('users.newusers');
}) ->name('newusers');



//fallback: Sempre no fim do ficheiro. Não chama nada pois vale para todos.
Route::fallback(function() {
    return view('users.newusers');
});


