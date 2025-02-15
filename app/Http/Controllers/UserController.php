<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
    public function returnAllUsersView(){
        $myName = $this->getMyVar();
        $allUsers = $this->getUsers();

        //da função acessória
        $usersFromDB = $this->getUsersFromDB();

        //dd($usersFromDB);

        return view('users.all_users', compact('myName', 'allUsers', 'usersFromDB'));
    }

    public function returnAddUsersView(){
       $myName = $this->getMyVar();
        return view('users.newusers', compact('myName'));
    }

    public function returnViewHome(){
        $myVar = 'Hello World';
        $myName = 'Sara';
        $shoppingList = ['Batata', 'Feijão', 'Chocolate'];

        $contactInfo = [
            'name' => 'Bruno',
            'email' => 'bruno.margel@gmail.com'
        ];

        $cesaeInfo = [
            'name' => 'Cesae',
            'address' => 'Rua Ciríaco Cardoso 186, 4150-212 Porto',
            'email' => 'cesae@cesae.pt'
            ];

        return view('view_home', compact('myVar', 'myName', 'shoppingList', 'contactInfo', 'cesaeInfo'));
    }

    private function getMyVar(){
        $myName = 'Sara';
        return $myName;
    }

    private function getUsers() {
        $users = [
            ['id' => 1, 'name' =>'Sara', 'email' => 'sara@gmail.com'],
            ['id' => 2, 'name' =>'Márcia', 'email' => 'Márcia@gmail.com'],
            ['id' => 3, 'name' =>'Bruno', 'email' => 'bruno@gmail.com']
        ];
        return $users;
    }


    //Vai a BD na tabela de users. Todos os itens obrigatórios
    public function insertUserIntoDB(){
        DB::table('users')
        ->insert([
            'name' => 'Bruno',
            'email' => 'bruno4@gmail.com',
            'password' => '12345',
        ]);

        return response()->json('user inserido');
    }

    // *********************************
    //Chamar rota do web.php para acionar a função
    public function updateUserIntoDB(){
        DB::table('users') //seleciona a tabela
        ->where('id', 3) //onde na tabela
        ->update([
            'name' => 'Nuno', //novo nome
            'updated_at' => now()
        ]);

        return response()->json('atualizado com sucesso'); //feedback
    }

    // *********************************
    public function deleteUserFromDB(){
        DB::table('users')
        ->where('email', 'bruno4@gmail.com')
        ->delete();
        return response()->json('eliminado');
    }

    // *********************************
    //Função acessória
    public function getUsersFromDB(){
        $usersFromDB =
        DB::table('users') //guardar dados para mandar para view
        ->get();
        return $usersFromDB;
    }

   // *****10.02 Btn Apagar*****

public function deleteUser($id){
    //primeiro apagar tarefa associada do users
    DB::table('tasks')
    ->where('user_id', $id)
    ->delete();
    //segundo apagar o users
    DB::table('users')
    ->where('id', $id) //colocar where senão apaga tudo
    ->delete();

    return back();
}

public function viewUser($id){
    $ourUser = DB::table('users')
    ->where('id', $id)
    ->first(); //first bucas uma linha e get busca um array

    return view('users.view_user', compact('ourUser'));
}

//*Função Forms*/

//Receber e Válidar
public function createUser(Request $request){
    //dd($request->all());
    $request->validate ([
    'name'=> 'required|string|max:50',
    'email'=>  'required|email|unique:users',
    'password'=>  'required|min:8'
]);

//Inserção BD
User::insert([
    'name' => $request->name,
    'email' => $request->email,
    'password' => Hash::make($request->password),
]);

return redirect()->route('users.all')->with('message', 'Utilizador adicionado com sucesso!');

}

//**********

public function createGift()
{
        return view('view_gift');
}







//
}











