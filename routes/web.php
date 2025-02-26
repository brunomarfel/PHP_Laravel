<?php

use App\Http\Controllers\UserController;

use App\Http\Controllers\returnAddUsersView;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\TaskController;

use App\Http\Controllers\GiftsController;

use Illuminate\Support\Facades\Route;


//***********Intermedia***********

Route::get('gifts/', [GiftsController::class, 'returnGifts'])->name('gifts');

Route::get('gifts/{gift}', [GiftsController::class, 'viewGifts'])->name('gifts.view');

//Botoes

Route::get('/view-gifts/{id}', [GiftsController::class, 'viewGifts'])->name('gifts.view'); //Rota Btn Ver

Route::get('/delete-gifts/{id}', [GiftsController::class, 'deleteGifts'])->name('gifts.delete'); //Rota Btn Apagar

//Formulario

Route::post('/gifts', [GiftsController::class, 'createGifts'])->name('gifts.create');

Route::get('/gifts/{id}', [GiftsController::class, 'viewGifts'])->name('gifts.view');

//*******************************









//Denominaçoes: 1 Nome Brwoser, 2 Nome Ficheiro View, 3 Nome Rota

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

Route::get('/home', function() {
    return view('view_home');
}) ->name('home');

//Rotas users
Route::get('/home', [HomeController::class, 'returnViewHome']) ->
 name('home');

Route::get('/users',[UserController::class,'returnAllUsersView'])->name('users.all');

Route::get('/add_users',[UserController::class,'returnAddUsersView'])->name('users.newusers');

//03.02 Quando aciona no browser chama a função
Route::get('/insert-user-db', [UserController::class, 'insertUserIntoDB']);

Route::get('/update-user-db', [UserController::class, 'updateUserIntoDB']);

Route::get('/delete-user-db', [UserController::class, 'deleteUserFromDB']);

//Rota Tarefa 31.01

Route::get('/task', [TaskController::class, 'returnView']) ->name('task');

//10.02 name chama o nome internamente
//definir rota e função
Route::get('/delete-user/{id}', [UserController::class, 'deleteUser'])->name('users.delete');

Route::get('/view-user/{id}', [UserController::class, 'viewUser'])->name('users.view');

//Exercício
Route::get('/delete-task/{id}', [TaskController::class, 'deleteTask'])->name('task.delete');

Route::get('/view-task/{id}', [TaskController::class, 'viewTask'])->name('task.view');

//Rota Forms Exemplo
Route::post('/create-users', [UserController::class, 'createUser'])->name('users.create');

//Rota Forms Exercício
Route::post('/create-task', [TaskController::class, 'createTask'])->name('task.create');

//Adiconar Tarefas
Route::get('/addtasks', [TaskController::class, 'createTasks'])->name('tasks.all');

//********** Aula 26.02

//Formulario Atualizar
Route::post("/update-user", [UserController::class, 'updateUser'])->name('users.update');




//*********fallback: Sempre no fim do ficheiro. Não chama nada pois vale para todos.
Route::fallback(function() {
    return view('users.newusers');
});
