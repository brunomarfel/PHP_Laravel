<?php

namespace App\Http\Controllers;

use App\Models\Gift;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class GiftsController extends Controller
{

    public function returnGifts()
{
    $gifts = Gift::join('users', 'gifts.user_id', '=', 'users.id')
                 ->select('gifts.*', 'users.name as user_name', 'gifts.spent_value')
                 ->get();

    return view('view_gift', compact('gifts'));

}

//Btn Ver
public function viewGifts($id){ //usar join
    $ourGift = DB::table('gifts')
    ->join('users', 'gifts.user_id', '=', 'users.id') //'=' opcional
    ->select('gifts.*', 'users.name as user_name')
    ->where('gifts.id', $id)
    ->first(); //first: 1º linha get:array
    return view('gifts_details', compact('ourGift'));
}

//Btm Apagar
public function deleteGifts($id){
    DB::table('gifts') //presente associado ao user
    ->where('id', $id)
    ->delete();

    return back();
}









//Route::get('/delete-gifts/{id}', [GiftsController::class, 'deleteGifts'])->name('gisfts.delete'); //Rota Btn Apagar





// public function verGifts($id)
// {
//     $gift = Gift::findOrFail($id);

//     return view('view_gift_details', compact('gift'));
// }

// public function showForm()
// {
//     $users = User::all();  // Recupera todos os usuários
//     dd($users);  // Depura os dados
//     return view('add_gift', compact('users'));  // Passa os usuários para a view
// }

// public function create(Request $request)
// {
//     // Validar os dados do formulário
//     $validated = $request->validate([
//         'name' => 'required|string|max:255',
//         'estimated_value' => 'required|numeric',
//         'spent_value' => 'nullable|numeric',
//         'user_id' => 'required|exists:users,id', // Verificar se o usuário existe
//     ]);

//     // Criar o presente
//     Gift::create($validated);

//     return redirect()->route('gifts')->with('success', 'Presente adicionado com sucesso!');
// }








    //
}
