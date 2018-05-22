<?php

namespace Escola\Http\Controllers;

use Illuminate\Http\Request;
use Escola\User;
use Escola\Models\Turma;
use Illuminate\Support\Facades\Hash;

class UserResourceController extends Controller
{
    /**
     * Exibe a view de perfil de usuario 
     * @param type $id 
     * @return type
     */
	public function showPerfil($id){
		$user = User::find($id);
		$turmasUser =  $user->turmas;
		return view('user.perfil',compact('user','turmasUser'));
	}

	/**
	 * Exibe o formulário para editar um usuário
	 * @param type $id 
	 * @return type
	 */
	public function edit($id){
		$user = User::find($id);
		$turmas = Turma::all();
		$tipoUsuario = array('administrador','professor','aluno');
		return view('auth.register',compact('user','tipoUsuario','turmas'));
	}

	public function update(Request $request, $id){
		//criptografa a senha 
		$request['password'] = Hash::make($request['password']);
		$formData = $request->all();

		$user = User::find($id);
		$user->update($formData);

		if (isset($request['turmas'])) {
            //recupera os ids das turma passadas pelo form
            $turmas = $request['turmas'];
            //sincroniza o usuario com a turma 
            $user->turmas()->sync($turmas);
        }  

		return redirect()->route('user.perfil',$id);
	}
}
