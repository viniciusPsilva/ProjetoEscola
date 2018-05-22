<?php

namespace Escola;

use Escola\Models\Turma;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','tipo','turma',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Um usuário pertence a muitas turmas
    public function turmas(){
        return User::belongsToMany(Turma::class);
    }

    //Um usuário pertence a muitas listas de presenças
    public function presencas(){
        return $this->belongsToMany(Presenca::class);
    }
}
