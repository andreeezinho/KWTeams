@extends('layout.main')

@section('titulo', 'Criar Usuário')

@section('content')
    <h1>CREATE USER</h1>

    {{--imprimir erros caso o REQUEST reporte algo --}}
    @if($errors->any())
        @foreach($errors->all() as $error)
            <h2>{{$error}}</h2>
        @endforeach
    @endif

    <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="file" name="icone" id="icone" placeholder="icone">
        <input type="text" name="name" id="name" placeholder="Nome">
        <input type="email" name="email" id="email" placeholder="email">
        <input type="password" name="password" id="password" placeholder="password">

        <button type="submit">Cadastrar</button>
    </form>
@endsection