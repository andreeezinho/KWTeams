<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    //informa que tarefa pertence a um usuario
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //informa que tarefa pertence a uma equipe
    public function equipe(){
        return $this->belongsTo('App\Models\Equipe');
    }
}
