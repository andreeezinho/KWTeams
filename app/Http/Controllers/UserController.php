<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//importando request de User
use App\Http\Requests\StoreUser;

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
}
