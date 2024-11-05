<div class="my-4">
    <label class="d-flex flex-column" for="imagem">
        <span class="text-muted">Escolha uma foto para sua equipe</span>
        <div class="position-relative">
            <img src="/img/equipes/{{$equipe->imagem ?? "default.png"}}" alt="default" class="bg-cinza rounded-circle mx-auto my-3" width="50px">
            <span class="text-secondary position-absolute bottom-0 camera-icone"><i class="bi-camera-fill"></i></span>
        </div>
    </label>
    <input type="file" name="imagem" id="imagem" class="text-muted" value="{{$equipe->imagem ?? old('imagem')}}">
</div>

<div class="form-floating my-4">                       
    <input type="text" name="nome" id="nome" class="form-control" value="{{$equipe->nome ?? old('nome')}}">
    <label for="nome">Insira o nome da equipe</label>
</div>

<div class="form-floating my-4" style="height: 100px;">                       
    <textarea name="descricao" id="descricao" class="form-control justify-content-center" style="height: 100px;">{{$equipe->descricao ?? ""}}</textarea>
    <label for="descricao">Insira uma descricao</label>
</div>