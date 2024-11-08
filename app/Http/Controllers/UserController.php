<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//importando request de User
use App\Http\Requests\StoreUser;

//importando request de editar usuario 
use App\Http\Requests\EditUser;

//importando model user
use App\Models\User;

class UserController extends Controller
{
    //classe de rota para criar usuario
    public function create(){
        return view('users.create');
    }

    //classe para cadastrar usuarior
    public function store(StoreUser $request){
        //valida os dados do request
        $validaDados = $request->validated();

        if($request->hasFile('icone') && $request->file('icone')->isValid()){
            $requestImage = $request->icone;
            
            //pegar nome do arquivo e transformar em md5
            $imageName = md5($requestImage->getclientOriginalName().strtotime("now")).".".$requestImage->getClientOriginalExtension();

            //veriavel para dizer qual sera o destino da imagem
            $destination = public_path('img/users');

            //adicionar a imagem na pasta no projeto
            $requestImage->move($destination, $imageName);

            //a coluna no banco de dados 'icone' vai ser igual a $imageName
            $validaDados['icone'] = $imageName;
        }

        //pega model do user e cria usuario
        User::create($validaDados);

        //retorna para home
        return redirect('/');
    }

    //classe da view de editar usuarios
    public function edit($id){
        //verifica se usuario existe
        if(!$user = User::find($id)){
            return redirect('/')->with('erro', 'Usuário não existe');
        }

        //verifica se o usuário é o mesmo que o id
        if($user->id != auth()->user()->id){
            return redirect('/')->with('erro', 'Usuário não validado');
        }

        return view('users.edit', compact('user'));
    }

    //atualizar usuario
    public function update(EditUser $request, $id){
        //verifica se usuario existe
        if(!$user = User::find($id)){
            return redirect('/')->with('erro', 'Usuário não existe');
        }

        //verifica se o usuário é o mesmo que o id
        if($user->id != auth()->user()->id){
            return redirect('/')->with('erro', 'Usuário não validado');
        }

        //faz request apenas de nome e email
        $update = $request->only('name', 'email');

        //verifica se há imagem para update
        if($request->hasFile('icone') && $request->file('icone')->isValid()){
            //remover imagem antiga do usuario da pasta img/users
            if($user->icone != 'default.jpg'){
                unlink(public_path('img/users/'.$user->icone));
            }

            $requestImage = $request->icone;

            //pegar nome do arquivo e transformar em md5
            $imageName = md5($requestImage->getclientOriginalName().strtotime("now")).".".$requestImage->getClientOriginalExtension();

            //veriavel para dizer qual sera o destino da imagem
            $destination = public_path('img/users');

            //adicionar a imagem na pasta no projeto
            $requestImage->move($destination, $imageName);

            //a coluna no banco de dados 'icone' vai ser igual a $imageName
            $update['icone'] = $imageName;
        }

        //verifica se há senha para o update
        if($request->password){
            //se existe senha, pegar ela e criptografar
            $update['password'] = bcrypt($request->password);
        }

        //faz o update
        $user->update($update);

        return redirect('/')->with('success', 'Seu perfil foi editado com sucesso');
    }
}
