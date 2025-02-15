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


    //
}
