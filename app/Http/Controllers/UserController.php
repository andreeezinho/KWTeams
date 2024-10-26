<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;

class UserController extends Controller
{
    //classe de rota para criar usuario
    public function create(){
        return view('users.create');
    }

    //classe para cadastrar usuario
    public function store(StoreUser $request){

        

        return redirect('/');
    }
}
