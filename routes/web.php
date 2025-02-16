<?php

use App\Http\Controllers\UserController;

use App\Http\Controllers\returnAddUsersView;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\TaskController;

use App\Http\Controllers\GiftsController;

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

//Route::get('/delete-user-db', [UserController::class, 'deleteUserFromDB']);

//Rota Tarefa 31.01

// '/task'(rota do HTML) controlador criado Função

//
Route::get('/task', [TaskController::class, 'returnView']) ->name('task');


//10.02 name chama o nome internamente
//definir rota e função
Route::get('/delete-user/{id}', [UserController::class, 'deleteUser'])->name('users.delete');

Route::get('/view-user/{id}', [UserController::class, 'viewUser'])->name('users.view');

//***********************************************************************************************
Route::get('/view-gifts/{id}', [GiftsController::class, 'viewGifts'])->name('gisfts.view'); //Rota Btn Ver

Route::get('/delete-gifts/{id}', [GiftsController::class, 'deleteGifts'])->name('gisfts.delete');
//***********************************************************************************************



//Exercício
Route::get('/delete-task/{id}', [TaskController::class, 'deleteTask'])->name('task.delete');

Route::get('/view-task/{id}', [TaskController::class, 'viewTask'])->name('task.view');

//Rota Forms Exemplo
Route::post('/create-users', [UserController::class, 'createUser'])->name('users.create');

//Rota Forms Exercício
Route::post('/create-task', [TaskController::class, 'createTask'])->name('task.create');

//Route::get('/add-tasks', [TaskController::class, 'createTask'])->name('add-tasks');

//Route::get('/tasks', [TaskController::class, 'createTask'])->name('tasks.all');


//Adiconar Tarefas
Route::get('/addtasks', [TaskController::class, 'createTasks'])->name('tasks.all');

//Denominaçoes: 1 nome do brwoser, 2 nome ficheiro dentro da view, 3 nome da rota


//Intermedia

Route::get('gifts/', [GiftsController::class, 'returnGifts'])->name('gifts');


Route::get('gifts/{gift}', [GiftsController::class, 'verGifts'])->name('gifts.show');



// Route::get('gifts/create', [GiftsController::class, 'showForm'])->name('gifts.create');


// Route::post('gifts', [GiftsController::class, 'create'])->name('gifts.store');



// Route::get('gifts/{id}', [UserController::class, 'showGift'])->name('gifts.show');
// Route::delete('gifts/{id}', [UserController::class, 'destroyGift'])->name('gifts.destroy');












//*********fallback: Sempre no fim do ficheiro. Não chama nada pois vale para todos.
Route::fallback(function() {
    return view('users.newusers');
});
