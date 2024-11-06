@extends('layout.main')

@section('Title', 'Seu Perfil')

@section('content')

    <div class="row justify-content-center mt-5">
        <div class="col-12 col-sm-8 col-lg-4 text-center mt-5">
            <form action="" method="POST">
                @csrf
                @method('put')
                <div class="text-center my-4">
                    <label class="d-flex flex-column" for="icone">
                        <span class="text-muted">Altere sua foto de perfil</span>
                        <div class="position-relative">
                            <img src="/img/users/{{$user->icone ?? "default.png"}}" alt="default" class="bg-cinza rounded-circle mx-auto my-3" width="50px">
                            <span class="text-secondary position-absolute bottom-0 camera-icone"><i class="bi-camera-fill"></i></span>
                        </div>
                    </label>
                    <input type="file" name="icone" id="icone" class="text-muted" value="{{$user->icone ?? old('icone')}}">
                </div>
    
                <div class="form-floating my-4">                       
                    <input type="text" name="name" id="name" class="form-control" value="{{$user->name ?? old('name')}}">
                    <label for="name">Seu nome</label>
                </div>

                <div class="form-floating my-4">                       
                    <input type="text" name="email" id="email" class="form-control" value="{{$user->email ?? old('email')}}">
                    <label for="email">Seu email</label>
                </div>

                <div class="form-floating my-4">                       
                    <input type="text" name="password" id="password" class="form-control">
                    <label for="password">Sua senha</label>
                </div>

                <button class="btn btn-dark"><i class="bi-pencil-fill"></i> Confirmar</button>
            </form>
        </div>
    </div>

@endsection