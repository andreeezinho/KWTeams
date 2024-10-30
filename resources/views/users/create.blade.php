@extends('layout.main')

@section('title', 'Criar Usuário')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-12 col-md-8 col-lg-4 text-center">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <img src="/img/logo-branca.png" alt="logo" width="80px">
                        <h1 class="mt-3">Cadastro</h1>
    
                        <div class="form-group my-4 p-3 border text-start">
                            <label for="icone" class="text-muted small">
                                <i class="bi-person-circle"></i>
                                Insira uma foto de perfil
                            </label>

                            <input type="file" name="icone" id="icone" class="form-control-file">
                        </div>
    
                        <div class="form-floating my-4">                       
                            <input type="text" name="name" id="name" class="form-control">
                            <label for="name">Insira seu nome</label>
                        </div>
    
                        <div class="form-floating my-4">                       
                            <input type="text" name="email" id="email" class="form-control">
                            <label for="email">Insira seu email</label>
                        </div>
    
                        <div class="form-floating my-4">
                            <input type="password" name="password" id="password" class="form-control">
                            <label for="password">Insira sua senha</label>
                        </div>
    
                        <button type="submit" class="btn btn-dark">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection