<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipeController extends Controller
{
    //view de criar equipe
    public function create(){

        return view('equipes.create');
        
    }
}
