<div class="row my-4">  
    <div class="col-4 d-flex flex-column">
        <label for="fazer" class="mb-2"><i class="bi-clipboard2-minus-fill"></i> Fazer </label>                     
        <input type="radio" name="status" value="Fazer"> 
    </div>

    <div class="col-4 d-flex flex-column">
        <label for="fazendo" class="mb-2"><i class="bi-kanban-fill"></i> Fazendo </label>                     
        <input type="radio" name="status" value="Fazendo"> 
    </div>

    <div class="col-4 d-flex flex-column">
        <label for="feito" class="mb-2"><i class="bi-check"></i> Feito </label>                     
        <input type="radio" name="status" value="Feito"> 
    </div>
</div>

<div class="form-floating my-4">                       
    <input type="text" name="nome" id="nome" class="form-control">
    <label for="nome">Insira o titulo da tarefa</label>
</div>

<div class="form-floating my-4" style="height: 200px;">                       
    <textarea name="descricao" id="descricao" class="form-control justify-content-center" style="height: 200px;"></textarea>
    <label for="descricao">Insira a descricao</label>
</div>

<button type="submit" class="btn btn-dark"><i class="bi-plus"></i> Criar</button>