<?php

namespace Escola\Models;

use Illuminate\Database\Eloquent\Model;

class Licao extends Model
{
    protected $fillable = ['titulo', 'descricao','id_turma'];

    //uma lição pertence a uma turma
    public function turma(){
        return $this->belongsTo(Turma::class);
    }

    //Uma turma tem muitos materiais
    public function materiais(){
        return $this->hasMany(Material::class);
    }
}
