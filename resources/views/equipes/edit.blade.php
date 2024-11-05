@extends('layout.main')

@section('title', 'Editar Equipe')

@section('content')

    <a href="{{route('equipes.tarefas', $equipe->id)}}" class="btn btn-secondary my-3"><i class="bi-arrow-left"></i> Voltar</a>

    <div class="row justify-content-center mt-5">
        <div class="col-12 col-md-8 col-lg-4 text-center">
            <div class="card">
                <div class="card-header">
                    <h3><i class="bi-pencil-fill"></i> Editar equipe</h3>
                    <p class="text-muted small m-0">Edite as informações da sua equipe</p>
                </div>
                <div class="card-body">
                    <form action="{{route('equipes.update', $equipe->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        @include('components.form-equipes')
    
                        <button type="submit" class="btn btn-dark"><i class="bi-plus"></i> Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection