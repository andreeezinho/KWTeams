<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//importando model Tarefa
use App\Models\Tarefa;

//importando request StoreTarefa
use App\Http\Requests\StoreTarefa;

class TarefaController extends Controller
{
    //classe da view home para consultar tarefas
    public function index(){
        //consultar todas as tarefas
        $tarefas = Tarefa::all();

        //passar dados do usuario
        $user = auth()->user();

        //verifica horario
            $hora = date('H');

            if($hora > '00' && $hora < '12'){
                $saudacao = "Bom dia";
            }

            if($hora >= '12' && $hora < '18'){
                $saudacao = "Boa tarde";
            }

            if($hora >= '18' && $hora < '23'){
                $saudacao = "Boa noite";
            }

        return view('welcome', ['tarefas' => $tarefas, 'user' => $user, 'saudacao' => $saudacao]);
    }

    //view de formulario de criar tarefa
    public function create(){

        return view('tarefas.create');

    }

    //criar nova tarefa
    public function store(StoreTarefa $request){
        //valida os dados do Model tarefa !!!!CRIAR REQUEST PARA FUNCIONAR!!!!!!
        $validaDados = $request->validated();

        //verifica id do usuario 
        $user = auth()->user()->id;

        //define id do user_id
        $validaDados['user_id'] = $user;

        //cria no banco de dados
        Tarefa::create($validaDados);

        return redirect('/');

    }
}
