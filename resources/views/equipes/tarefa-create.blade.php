@extends('layout.main')

@section('title', 'Criar Tarefa')

@section('content')

    <div class="row justify-content-center mt-5">
        @include('components.saudacao-equipe')
        <div class="col-12 col-md-8 col-lg-4 text-center">
            <div class="card">
                <div class="card-header">
                    <h3><i class="bi-plus"></i> Nova Tarefa</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('equipes.tarefas.store', $equipes->id)}}" method="POST">
                        @csrf
                        
                        @include('components.tarefa-form')
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection