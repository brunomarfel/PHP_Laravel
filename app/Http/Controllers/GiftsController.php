<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Gift;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class GiftsController extends Controller
{

    public function returnGifts()
{
    $users=DB::table('users')->get();
    $gifts = Gift::join('users', 'gifts.user_id', '=', 'users.id')
                 ->select('gifts.*', 'users.name as user_name', 'gifts.spent_value')
                 ->get();

    return view('view_gift', compact('gifts', 'users'));

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

//Formulario

//Receber e validar
public function createGifts(Request $request)
{
    //dd($request->all());
    $request->validate([
        'name' => 'required|string|max:50',
        'estimated_value' => 'required|numeric',
        'spent_value' => 'nullable|numeric',
        'user_id' => 'required|exists:users,id'
    ]);

    //Inserir BD
    Gift::insert([  //ver diferença entre insert e create
        'name' => $request->name,
        'estimated_value' => $request->estimated_value,
        'spent_value' => $request->spent_value,
        'user_id' => $request->user_id,
    ]);

    return redirect()->back()->with('message', 'Presente adicionado!');
}

public function showGiftDetails($id)
{
    $users = User::all();
    $ourGift = Gift::find($id);

    return view('view_gift', compact('users', 'ourGift'));
}




//
}
