<?php

namespace Escola\Models;

use Illuminate\Database\Eloquent\Model;
use Escola\User;

class Presenca extends Model
{
    protected $fillable = ['nome_instrutor','turma_id'];

    //Uma lista de presença pertence a uma turma
    public function turma(){
        return $this->belongsTo(Turma::class);
    }

    //uma lista de presença tem muitos usuarios presentes
    public function users(){
    	return $this->belongsToMany(User::class);
    }

    //Retorna os usuários que faltaram na aula
    public function getUsuariosFaltaram(){
        //busca a turma e todos os alunos da turma 
        $turma = Turma::find($this->turma_id);
        $todosAlunos =  $turma->users()->where('tipo','aluno')->get();
        //Paga todos os alunos presentes na lista
        $alunosPresentes= Presenca::users()->get();

        $idTodosAlunos = array();
        $idAlunosPresentes = array();
        $alunosFaltantes = array();

        //cria um array com os ids de todos os alunos da turma
       foreach ($todosAlunos as $a) {
            array_push($idTodosAlunos, $a->id);
        }
        ////cria um array com os ids de todos os alunos presentes
        foreach ($alunosPresentes as $a) {
            array_push($idAlunosPresentes, $a->id);
        }

        //verifica qual aluno da turma não esta na lista
        foreach ($idTodosAlunos as $idAluno) {
            if (!in_array($idAluno, $idAlunosPresentes)) {
               $user = User::find($idAluno);
               array_push($alunosFaltantes, $user);
            }            
        }
    	return $alunosFaltantes;
    }
}