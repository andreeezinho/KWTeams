<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    //informa que equipe pode ter varias tarefas
    public function tarefas(){
        return $this->hasMany('App\Models\Tarefa');
    }
}
