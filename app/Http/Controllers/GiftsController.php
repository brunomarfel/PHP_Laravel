<?php

namespace App\Http\Controllers;

use App\Models\Gift;

use Illuminate\Http\Request;

class GiftsController extends Controller
{

    public function returnGifts()
{
    $gifts = Gift::join('users', 'gifts.user_id', '=', 'users.id')
                 ->select('gifts.*', 'users.name as user_name', 'gifts.spent_value')
                 ->get();

    return view('view_gift', compact('gifts'));
}

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
