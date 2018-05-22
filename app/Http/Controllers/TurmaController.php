<?php

namespace Escola\Http\Controllers;

use Illuminate\Http\Request;
use Escola\Models\Turma;
use Escola\Http\Requests\TurmaFormRequest;

class TurmaController extends Controller
{
    private $turma;
        function __construct(Turma $turma){
        $this->turma = $turma;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turmas = $this->turma->all();
        return view('turma.lista',compact('turmas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //retorna a view de cadastro e edição de turmas
        return view('turma.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TurmaFormRequest $request)
    {
        $formData = $request->all();
        $insert = $this->turma->create($formData);

        if ($insert){
            return redirect()->route('turma.index');
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $turma = Turma::find($id);
        $professores= $turma->users()->where('tipo','professor')->get();
        $alunos = $turma->users()->where('tipo','aluno')->get();
        $presencas = $turma->presencas;
        $licoes = $turma->licaos;

        return view('turma.exibir',compact('alunos','professores','turma','presencas','licoes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {           
        $turma = $this->turma->find($id);
        $formTitle = "Editar Turma";
        return view('turma.create-edit',compact('turma','formTitle'));
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
        $formData = $request->all();
        $turma = $this->turma->find($id);

        $turma->update($formData);

        return redirect()->route('turma.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->turma->find($id)->delete();

        return redirect()->route('turma.index');
    }
}
