<?php

namespace Escola\Models;

use Escola\User;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $fillable = ['nome'];

    
    /**
     * uma turma pertence a muitos usuários
     * Metodo retorna todos os usuarios da turma
     * @return type
     */
    public function users(){
        return Turma::belongsToMany(User::class);
    }

    /**
     * Uma turma tem muitas lições
     * Retorna todas as lições da turma 
     * @return type
     */
    public function licoes(){
        return $this->hasMany(Licao::class);
    }

    /**
     * Uma turma tem muitas listas de presença
     * Retorna todas as lista de presença de uma turma 
     * @return type
     */
    public function presencas(){
        return $this->hasMany(Presenca::class);
    }
}
