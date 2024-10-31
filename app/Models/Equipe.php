<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{

    //perimitir que dados sejam enviados através do model
    protected $fillable = [
        'nome',
        'descricao',
        'dono',
        'imagem'
    ];

    //informa que equipe pode ter varias tarefas
    public function tarefas(){
        return $this->hasMany('App\Models\Tarefa');
    }
}
