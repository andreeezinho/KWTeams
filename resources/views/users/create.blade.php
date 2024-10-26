@extends('layout.main')

@section('titulo', 'Home')

@section('content')
    <h1>CREATE USER</h1>

    <form action="{{route('users.store')}}" method="POST">
        @csrf
        <input type="file" name="naiconee" id="icone" placeholder="icone">
        <input type="text" name="name" id="name" placeholder="Nome">
        <input type="email" name="email" id="email" placeholder="email">
        <input type="password" name="password" id="password" placeholder="password">
    </form>
@endsection