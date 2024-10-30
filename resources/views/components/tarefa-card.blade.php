<div class="card col-10 mx-auto my-3">
    <div class="card-header">
        <h3 class="text-center">{{$tarefa->nome}}</h3>
    </div>

    <div class="card-body">
        <p class="text-muted">{{$tarefa->descricao}}</p>

        <div class="d-flex justify-content-center">
            @if($tarefa->status != "Feito")
               
                <form action="{{route('tarefas.update', $tarefa->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-primary mx-1 px-3"><i class="bi-check"></i></button>
                </form>

            @endif

            <form action="{{route('tarefas.destroy', $tarefa->id)}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger mx-1 px-3"><i class="bi-trash"></i></button>
            </form>
        </div>
    </div>
</div>