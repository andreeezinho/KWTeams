@extends('layout.main')

@section('title', 'Ver Equipes')

@section('content')

    <div class="row mt-5 equipes">
        <h2 class="mb-5 pb-2 border-bottom">Equipes</h2>

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
                                @if ($participa == true)
                                    <span class="btn btn-secondary"><i class="bi-people-fill"></i> Sua equipe</span>
                                @else
                                    <form action="{{route('equipes.participar', $equipe->id)}}" method="post">
                                        @csrf
                                        <button class="btn btn-dark mx-2"><i class="bi-person-plus-fill"></i> Participar</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        @else
            <h5 class="text-muted">Não há equipes, por enquanto...</h5>
        @endif
    </div>


@endsection