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
        $equipe = Equipe::create($validaDados);

        $equipe->users()->attach($user);

        //manda para a rota de equipes
        return redirect('/equipes')->with('success', 'Equipe criada com sucesso');

    }

    public function equipes(){
        //idusuario autenticado
        $userId = auth()->user()->id;

        //consulta todas as equipes, jutamente com os usuario da tabela equipeUser
        $equipes = Equipe::with('users')->get();

        return view('equipes.show-equipes', ['equipes' => $equipes, 'userId' => $userId]);
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
