<div class="card col-10 mx-auto my-3">
    <div class="card-header">
        <h3 class="text-center">
            {{$tarefa->nome}}
            <img src="/img/users/{{$tarefa->user->icone}}" alt="" class="float-end icone rounded-circle">
        </h3>

        <p class="text-center text-muted small my-0 py-0">Criada por: {{$tarefa->user->name}}</p>
    </div>

    <div class="card-body">
        <p class="text-muted">{{$tarefa->descricao}}</p>

        <div class="d-flex justify-content-center">
            @if($tarefa->status != "Feito")
               
                <form action="{{route('equipes.tarefas.update', ['id' => $equipes->id, 'tarefa' => $tarefa->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-primary mx-1 px-3"><i class="bi-check"></i></button>
                </form>
            @endif

            <form action="{{route('equipes.tarefas.destroy', ['id' => $equipes->id, 'tarefa' => $tarefa->id])}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger mx-1 px-3"><i class="bi-trash"></i></button>
            </form>
        </div>
    </div>
</div>