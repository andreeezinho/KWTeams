<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//importando Model Equipe
use App\Models\Equipe;

//importando request 
use App\Http\Requests\StoreEquipe;



class EquipeController extends Controller
{
    //view de criar equipe
    public function create(){

        return view('equipes.create');

    }

    //criar usuario 
    public function store(StoreEquipe $request){

        //valida os dados do request
        $validaDados = $request->validated();
        
        //verifica se imagem existe
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $requestImage = $request->imagem;

            //pegar nome do arquivo e transformar em md5
            $imageName = md5($requestImage->getclientOriginalName().strtotime("now")).".".$requestImage->getClientOriginalExtension();

            //veriavel para dizer qual sera o destino da imagem
            $destination = public_path('img/equipes');

            //adicionar a imagem na pasta no projeto
            $requestImage->move($destination, $imageName);

            //a coluna no banco de dados 'icone' vai ser igual a $imageName
            $validaDados['imagem'] = $imageName;
        }

        //pega id do usuario
        $user = auth()->user()->id;

        //define dono da equipe (atraves do id do usuario)
        $validaDados['dono'] = $user;

        //cadastrar dados no banco de dados
        Equipe::create($validaDados);

        //manda para a rota de equipes
        return redirect('/equipes')->with('success', 'Equipe criada com sucesso');

    }
}
