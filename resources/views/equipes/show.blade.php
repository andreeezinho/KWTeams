@extends('layout.main')

@section('title', 'Suas Equipes')

@section('content')

    <div class="row mt-5 equipes">
        <h2 class="mb-5 pb-2 border-bottom">Suas equipes</h2>

        @if(count($equipes) > 0)
            @foreach ($equipes as $equipe)
                <div class="col-3">
                    <div class="card">
                        <div class="card-header d-flex">
                            <img src="/img/equipes/{{$equipe->imagem}}" alt="Icone equipe" class="rounded-circle icone">
                            <h4 class="mx-2">{{$equipe->nome}}</h4>
                        </div>

                        <div class="card-body">
                            <p class="text-muted">{{$equipe->descricao}}</p>

                            <div class="d-flex mt-3 justify-content-center">
                                <form action="{{route('equipes.sair', $equipe->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger mx-2"><i class="bi-box-arrow-left"></i> Sair</button>
                                </form>

                                <a href="{{route('equipes.tarefas', $equipe->id)}}" class="btn btn-primary mx-2"><i class="bi-people-fill"></i> Entrar</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        @else
            <h5 class="text-muted">Você não participa de nenhuma equipe</h5>
        @endif
    </div>


@endsection