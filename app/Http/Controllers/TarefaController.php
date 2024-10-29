<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//importando model Tarefa
use App\Models\Tarefa;

class TarefaController extends Controller
{
    //view de formulario de criar tarefa
    public function create(){

        return view('tarefas.create');

    }

    //criar nova tarefa
    public function store(){

        //verifica id do usuario 
        $user = auth()->user()->id;

        return view('/');

    }
}
