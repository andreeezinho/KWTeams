<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//importando controllers
use App\Http\Controllers\UserController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\TarefaController;

//definindo que rotas só podem ser acessadas se o usuario estiver autenticado
Route::middleware('auth')->group(function(){

    //rota para criar equipe
    Route::post('/equipes/store', [EquipeController::class, 'store'])->name('equipes.store');

    //rota para view de criar equipe
    Route::get('/equipes/create', [EquipeController::class, 'create'])->name('equipes.create');

    //rota para atualizar status
    Route::put('/tarefas/{id}', [TarefaController::class, 'update'])->name('tarefas.update');

    //rota para deletar tarefa
    Route::delete('/tarefas/{id}', [TarefaController::class, 'destroy'])->name('tarefas.destroy');

    //rota para criar a tarefa
    Route::post('/tarefas', [TarefaController::class, 'store'])->name('tarefas.store');

    //rota para view de nova tarefa
    Route::get('/tarefas/create', [TarefaController::class, 'create'])->name('tarefas.create');

    //rota para a HOME
    Route::get('/', [TarefaController::class, 'index'])->name('home');

});

//rota para view de cadastro de um usuário
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

//rota para cadastrar um usuario
Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
