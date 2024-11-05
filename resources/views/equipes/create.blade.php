@extends('layout.main')

@section('title', 'Criar Equipe')

@section('content')
    
<div class="row justify-content-center mt-5">
    <div class="col-12 col-md-8 col-lg-4 text-center">
        <div class="card">
            <div class="card-header">
                <h3><i class="bi-plus"></i> Nova Equipe</h3>
                <p class="text-muted small m-0">Insira as informações para criar equipe</p>
            </div>
            <div class="card-body">
                <form action="{{route('equipes.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @include('components.form-equipes')

                    <button type="submit" class="btn btn-dark"><i class="bi-plus"></i> Criar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection