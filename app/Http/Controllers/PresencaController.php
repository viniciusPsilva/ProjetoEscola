<?php

namespace Escola\Http\Controllers;

use Illuminate\Http\Request;
use Escola\Models\Turma;
use Escola\Models\Presenca;

class PresencaController extends Controller
{
     private $presenca;

    function __construct(Presenca $presenca){
        $this->presenca = $presenca;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function showFormPresenca($idTurma){
        $turma = Turma::find($idTurma);
        $alunos = $turma->users()->where('tipo','aluno')->get();
        
        return view('presenca.create-edit',compact('turma','alunos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = $request->all();
        
        $presenca = $this->presenca->create($formData);

        if (isset($formData['alunos'])) {
            $presenca->users()->sync($formData['alunos']);
        }

        return redirect()->route('turma.show',$presenca->turma_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $presenca = $this->presenca->find($id);
        $alunosPresentes = $presenca->users;
        $alunosFaltantes = $presenca->getUsuariosFaltaram();
        $turma = Turma::find($presenca->turma_id);

        return view('presenca.exibir',compact('presenca','alunosPresentes', 'alunosFaltantes','turma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
