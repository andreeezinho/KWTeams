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
    public function store(Tarefa $request){

        //verifica id do usuario 
        $user = auth()->user()->id;

        //valida os dados do Model tarefa !!!!CRIAR REQUEST PARA FUNCIONAR!!!!!!
        $validaDados = $request->validated();

        //define id do user_id
        $validaDados["user_id"] = $user;

        //cria no banco de dados
        Tarefa::create($validaDados);

        return view('/');

    }
}
