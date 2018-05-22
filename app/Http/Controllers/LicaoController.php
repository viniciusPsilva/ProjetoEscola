<?php

namespace Escola\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Escola\Models\Turma;
use Escola\Models\Licao;
use Escola\Models\Material;

class LicaoController extends Controller
{
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
        return redirect()->route('formLicao');
    }

    /**
     * Exibe o formulário para cadastro de licao
     * @param type $idTurma 
     * @return type
     */
    public function showFormLicao($idTurma)
    {
        $turma = Turma::find($idTurma);

        return view('licao.create-edit',compact('turma'));

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

        $licao = Licao::create($formData);

        if ($request->hasFile('material')) {            
            $materiais = $request->file('material');
            //Storage::makeDirectory('public/materiais_licao_teste')
            $contador = 0;
            foreach ($materiais as $material) {
                $contador++;
                $caminho = Storage::putFileAs('public/materiais_licao_teste',$material,
                    'material_'.$contador.'.'.$material->extension());

                Material::create([
                    'path_name'=>$caminho, 
                    'id_licao' => $licao->id
                ]);
            }
            die();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
