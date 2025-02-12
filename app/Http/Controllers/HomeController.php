<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function returnViewHome(){
        $myVar = 'Hello World';
        $myName = 'Sara';
        $shoppingList = ['batatas', 'feijões', 'chocolate'];

        $contactInfo = [
            'name' => 'Bruno',
            'email' => 'bruno.margel@gmail.com'
        ];

        $cesaeInfo = [
            'name' => 'Cesae',
            'address' => 'Rua Ciríaco Cardoso 186, 4150-212 Porto',
            'email' => 'cesae@cesae.pt'
            ];

        //dd($shoppingList);

        return view('view_home', compact('myVar', 'myName', 'shoppingList', 'contactInfo', 'cesaeInfo'));
    }
}
