<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

//Importar
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{

    //Função Retorna View
    public function returnView() {

        $tasksList = $this->tasksList();
        $avaliableTasks = $this->tasksAvaliable();
        //Variável
        $tasksFromDB = $this->getAllTasks();
        $users=DB::table('users')->get();

        //dd($tasksFromDB); verificar
        return view('view_task', compact('tasksList', 'avaliableTasks', 'tasksFromDB', 'users'));
    }

    public function tasksList(){
        $tasks = [
            ['name' => 'Bruno', 'task' => 'Estudar JS'],
            ['name' => 'Felipe', 'task' => 'Estudar Figma']
        ];

        //ficheiro criado //variavel

        return $tasks;
    }

    public function tasksAvaliable(){
        $availableTasks=['sql', 'js', 'Java', 'POO'];
        return $availableTasks;

    }

 // *********************************
    //Função acessória
    private function getAllTasks(){
        $tasksFromDB =
        DB::table('tasks')
        ->join('users', 'users.id', '=', 'tasks.user_id')
        ->select('tasks.*', 'users.name as user_name')
        ->get();
        //dd($tasksFromDB);
        return $tasksFromDB;
    }

//Exercício
public function deleteTask($id){
    DB::table('tasks')
    ->where('id', $id)
    ->delete();
    return back();
}

public function viewTask($id){
    $ourTask = DB::table('tasks')
    ->join('users', 'users.id', '=', 'tasks.user_id') //Join para mostrar nome em vez de id
   //Tudo da tabela 'tasks.*'. E 'users.name as user_name'
    ->select('tasks.*', 'users.name as user_name')
    ->where('tasks.id', $id) //especificar id, pois ao fazer o Join traz dois id's
    ->first();
    //dd($ourTask);
    return view('users.view_tasks', compact('ourTask')); //Caminho Blade (users.view_tasks)
}

//Auça 10.02
public function createTask(Request $request){
    //dd($request->all());
    $request->validate ([
        'name'=> 'required|string|max:5',
        'description'=> 'string' ,
        'user_id'=>  'required'
    ]);

    //Inserção BD
Task::insert([
    'name' => $request->name,
    'description' => $request->description,
    'user_id' => $request->user_id,
]);

return redirect()->route('tasks.all')->with('message', 'Tarefa adicionada!');

}

//
}





