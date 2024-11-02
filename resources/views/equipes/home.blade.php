@extends('layout.main')

@section('title', 'Equipe')

@section('content')

    <div class="row justify-content-center mt-5">
        @include('components.saudacao-equipe')

        <div class="col-sm-12 col-md-4 justify-content-center border-right">
            <h1 class="text-center border-bottom">Fazer</h1>
            @foreach($tarefas as $tarefa)

                @if($tarefa->status == "Fazer" && $tarefa->equipe_id == $equipe_id)

                    @include('components.tarefa-card-equipe')

                @endif
            @endforeach
        </div>

        <div class="col-sm-12 col-md-4 justify-content-center border-right">
            <h1 class="text-center border-bottom">Fazendo</h1>

            @foreach($tarefas as $tarefa)
                @if($tarefa->status == "Fazendo" && $tarefa->equipe_id == $equipe_id)

                    @include('components.tarefa-card-equipe')

                @endif
            @endforeach
        </div>

        <div class="col-sm-12 col-md-4 justify-content-center">
            <h1 class="text-center border-bottom">Feito</h1>

            @foreach($tarefas as $tarefa)
                @if($tarefa->status == "Feito" && $tarefa->equipe_id == $equipe_id)

                    @include('components.tarefa-card-equipe')

                @endif
            @endforeach
        </div>
    </div>

@endsection