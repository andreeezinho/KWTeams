

                    <div class="card col-10 mx-auto my-3">
                        <div class="card-header">
                            <h3 class="text-center">{{$tarefa->nome}}</h3>
                        </div>
                    
                        <div class="card-body">
                            <p class="text-muted">{{$tarefa->descricao}}</p>
                    
                            <div class="d-flex justify-content-center">
                                @if($tarefa->status != "Feito")
                                    <a href="#" class="btn btn-primary mx-1 px-3"><i class="bi-check"></i></a>
                                @endif
                                
                                <a href="#" class="btn btn-danger mx-1 px-3"><i class="bi-trash-fill"></i></a>
                            </div>
                        </div>
                    </div>