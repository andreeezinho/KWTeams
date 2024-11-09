<div class="col-12 mt-2 mb-5">
    <h2 class="">
        <a href="{{route('equipes.tarefas', $equipes->id)}}" class="none text-dark">
            <img src="/img/equipes/{{$equipes->imagem}}" alt="Logo equipe" class="rounded-circle icone-equipe">
            {{$equipes->nome}}
        </a>
        <div class="float-end d-flex">
            <a href="{{route('equipes.tarefas.create', $equipes->id)}}" class="btn btn-dark mx-1"><i class="bi-plus"></i> Criar Tarefa</a>

            @if ($equipes->user_id == auth()->user()->id)
                <div class="dropdown mx-1">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi-pencil-fill"></i> Editar</button>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item py-2" href="{{route('equipes.edit', $equipes->id)}}"><i class="bi-people-fill"></i> Equipe</a></li>
                        <li><a class="dropdown-item py-2" href="{{route('equipes.participantes', $equipes->id)}}"><i class="bi-person-square"></i> Participantes</a></li>
                    </ul>
                </div>
            @endif
        </div>
    </h2>
</div>  