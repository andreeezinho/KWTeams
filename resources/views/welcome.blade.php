@extends('layout.main')

@section('titulo', 'Home')

@section('content')
    <div class="row justify-content-center mt-5">
        @include('components.saudacao')

        <div class="col-sm-12 col-md-4 justify-content-center border-right">
            <h1 class="text-center border-bottom">Fazer</h1>
            @foreach($tarefas as $tarefa)

                @if($tarefa->status == "Fazer")

                    @include('components.tarefa-card')

                @endif
            @endforeach
        </div>

        <div class="col-sm-12 col-md-4 justify-content-center border-right">
            <h1 class="text-center border-bottom">Fazendo</h1>

            @foreach($tarefas as $tarefa)
                @if($tarefa->status == "Fazendo")

                    @include('components.tarefa-card')

                @endif
            @endforeach
        </div>

        <div class="col-sm-12 col-md-4 justify-content-center">
            <h1 class="text-center border-bottom">Feito</h1>

            @foreach($tarefas as $tarefa)
                @if($tarefa->status == "Feito")

                    @include('components.tarefa-card')

                @endif
            @endforeach
        </div>
    </div>
@endsection