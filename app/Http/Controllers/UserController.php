<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

use App\Models\Gift;


class UserController extends Controller
{
    public function returnAllUsersView(){
        $myName = $this->getMyVar();
        $allUsers = $this->getUsers();

        //da função acessória
        // $usersFromDB = $this->getUsersFromDB();


        // $search = null;

        // if(request()->query('search')){
        //     $search = request()->query('search');

        // }else{
        //     $search = null;
        // }

        $search = request()->query('search') ? request()->query('search'):null;


        $usersFromDB = db::table('users');
        if( $search){
            $usersFromDB =  $usersFromDB->where('name', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%")
            ->orWhere('address', 'like', "%{$search}%");
        }


        $usersFromDB =  $usersFromDB ->get(); //26.02 Pesquisa Users


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
    ->first(); //first busca uma linha e get busca um array

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

//********** Aula 26.02

//Funçao Formulario Atualizar

public function updateUser(Request $request){ //classe traz objeto do browser
    $request->validate([
         'name' => 'required'
        ]);

    Db::table('users')->where('id', $request->id)
    ->update([
        'name' =>$request->name,
        'address' =>$request->address,
        'nif' =>$request->nif,
        'updated_at' => now(),
    ]);

    return redirect()->route('users.all')->with('message', 'Utilizador atualizado com sucesso!');

}
































//
}











