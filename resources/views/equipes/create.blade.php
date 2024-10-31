@extends('layout.main')

@section('title', 'Criar Equipe')

@section('content')
    
<div class="row justify-content-center mt-5">
    <div class="col-12 col-md-8 col-lg-4 text-center">
        <div class="card">
            <div class="card-header">
                <h3><i class="bi-plus"></i> Nova Tarefa</h3>
            </div>
            <div class="card-body">
                <form action="{{route('equipes.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="my-4">
                        <label class="d-flex flex-column" for="imagem">
                            <span class="text-muted">Escolha uma foto para sua equipe</span>
                            <div class="position-relative">
                                <img src="/img/equipes/default.png" alt="default" class="bg-cinza rounded-circle mx-auto" width="50px">
                                <span class="text-secondary position-absolute bottom-0 camera-icone"><i class="bi-camera-fill"></i></span>
                            </div>
                        </label>
                        <input type="file" name="imagem" id="imagem" class="text-muted">
                    </div>

                    <div class="form-floating my-4">                       
                        <input type="text" name="nome" id="nome" class="form-control">
                        <label for="nome">Insira o nome da equipe</label>
                    </div>

                    <div class="form-floating my-4" style="height: 100px;">                       
                        <textarea name="descricao" id="descricao" class="form-control justify-content-center" style="height: 100px;"></textarea>
                        <label for="descricao">Insira uma descricao</label>
                    </div>

                    <button type="submit" class="btn btn-dark"><i class="bi-plus"></i> Criar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection