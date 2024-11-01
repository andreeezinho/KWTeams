<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//importando Model Equipe
use App\Models\Equipe;

use App\Models\User;

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
        $validaDados['user_id'] = $user;

        //cadastrar dados no banco de dados
        Equipe::create($validaDados);

        //manda para a rota de equipes
        return redirect('/equipes')->with('success', 'Equipe criada com sucesso');

    }

    public function equipes(){
        //consulta todas as equipes
        $equipes = Equipe::All();

        //verificar usuario autenticado
        $user = auth()->user();

        $id = $user->id;

        //verificar se usuario já participa da equipe
        $participa = false;

        //transforma em array e percorre ele
        $verificaEquipe = $user->equipeUser->toArray();

        //percorrer array para verificar id do usuario
        foreach($verificaEquipe as $idUser){
            //se id do usuario na tabela EquipeUser existir
            if($idUser['user_id'] == $id){
                $participa = true;
            }
        }

        //percorre todas as equipes
        foreach($equipes as $equipe){
            //verifica se usuario é o dono da equipe
            if($id == $equipe->user_id){
                $participa = true;
            }
        }

        return view('equipes.show-equipes', ['equipes' => $equipes, 'participa' => $participa]);
    }

    //view de mostrar equipes
    public function show(){
        //pegar usuario autenticado
        $user = auth()->user();

        //consultar equipes que tem relação ManyToMany com o usuario autenticado
        $equipes = $user->equipeUser;

        return view('equipes.show', ['equipes' => $equipes]);
    }

    //classe para usuario participar de uma equipe
    public function participar($id){
        //pegar id do usuario
        $user = auth()->user();

        //inserir usuario na equipe atraves do MODEL/user que tem a relação ManyToMany
        $user->equipeUser()->attach($id);

        return redirect('/users/equipes')->with('success', 'Você entrou na equipe!');
    }

    //classe para usuario sair de uma equipe
     public function sair($id){
        //pegar id do usuario
        $user = auth()->user();

        //inserir usuario na equipe atraves do MODEL/user que tem a relação ManyToMany
        $user->equipeUser()->detach($id);

        return redirect('/users/equipes')->with('success', 'Você saiu da equipe!');
    }
}
