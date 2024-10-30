@extends('layout.main')

@section('titulo', 'Home')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-12 my-2">
            <p class="text-muted"><i class="bi-sun"></i> Bom dia, Usuário</p>
        </div>  

        <div class="col-sm-12 col-md-4 justify-content-center border-right">
            <h1 class="text-center border-bottom">Fazer</h1>

            <div class="card col-10 mx-auto my-3">
                <div class="card-header">
                    <h3 class="text-center">Nome tarefa</h3>
                </div>

                <div class="card-body">
                    <p class="text-muted">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Error recusandae asperiores numquam sapiente magnam dolorem velit aut enim consequuntur delectus?
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="#" class="btn btn-primary mx-1 px-3"><i class="bi-check"></i></a>
                        <a href="#" class="btn btn-danger mx-1 px-3"><i class="bi-trash-fill"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-4 justify-content-center border-right">
            <h1 class="text-center border-bottom">Fazendo</h1>

            <div class="card col-10 mx-auto my-3">
                <div class="card-header">
                    <h3 class="text-center">Nome tarefa</h3>
                </div>

                <div class="card-body">
                    <p class="text-muted">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Error recusandae asperiores numquam sapiente magnam dolorem velit aut enim consequuntur delectus?
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="#" class="btn btn-primary mx-1 px-3"><i class="bi-check"></i></a>
                        <a href="#" class="btn btn-danger mx-1 px-3"><i class="bi-trash-fill"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-4 justify-content-center">
            <h1 class="text-center border-bottom">Feito</h1>

            <div class="card col-10 mx-auto my-3">
                <div class="card-header">
                    <h3 class="text-center">Nome tarefa</h3>
                </div>

                <div class="card-body">
                    <p class="text-muted">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Error recusandae asperiores numquam sapiente magnam dolorem velit aut enim consequuntur delectus?
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="#" class="btn btn-danger mx-1 px-3"><i class="bi-trash-fill"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection