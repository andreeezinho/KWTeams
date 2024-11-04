@extends('layout.main')

@section('title', 'Participantes')

@section('content')

    <a href="{{route('equipes.tarefas', $equipeId->id)}}" class="btn btn-secondary my-3"><i class="bi-arrow-left"></i> Voltar</a>
    <div class="row justify-content-center mt-5">  
        @if (count($equipes) > 0)
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><i class="bi-person-square"></i></th>
                        <th>Participante</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($equipes as $equipe)
                        <tr>
                            <td><img src="/img/users/{{$equipe->icone}}" alt="User icone" class="icone rounded-circle"></td>
                            <td>{{$equipe->name}}</td>
                            <td>{{$equipe->email}}</td>
                            <td class="text-center">
                                <form action="{{route('equipes.participantesDestroy', ['id' => $equipeId->id, 'participante' => $equipe->id])}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    @if ($equipe->id == auth()->user()->id)
                                        <span class="btn btn-secondary"><i class="bi-person-fill"></i> Você</span>
                                    @else
                                        <button class="btn btn-danger"><i class="bi-box-arrow-left"></i> Remover</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @else
            <h2>Não há usuários na equipe...</h2>
        @endif

    </div>

@endsection