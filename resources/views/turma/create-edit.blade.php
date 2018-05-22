@extends('template.template')

@section('content')
<div class="content">
	<!-- card com frmulário de cadastro de usuario-->
    <div class="row">
        <div class="col s12 m6 l6 offset-l3 offset-m3 style-margin-top">
          <div class="card">
            <div class="card-content">
              <span class="card-title blue-text text-darken-2">{{$formTitle or "Cadastro de Turmas"}}</span>
              		<!--Formulário de cadastro de usuário-->
	    <div class="row">
	    	<!--Testa se a turma foi enviada se foi então esta editando Turma-->
	    	@if(isset($turma))
	        	<form method="post" class="col s12 m12 l12" action="{{route('turma.update',$turma->id)}}">
	        		{!! method_field('PUT') !!}
	        @else
	        	<form method="post" class="col s12 m12 l12" action="{{route('turma.store')}}">
	        @endif

	            @csrf
	            <!--Nome-->
	            <div class="row">
	                <div class="input-field col s12">
	                    <i class="material-icons prefix green-text text-darken-2">mode_edit</i>
	                    <input id="nome" type="text" name="nome" class="validate" value="{{$turma->nome or old('nome')}}">
	                    <label for="nome">Nome</label>

	                    @if ($errors->has('nome'))
	                        <span class="red-text text-darken-2">
	                            <strong>{{ $errors->first('nome') }}</strong>
	                        </span>
	                    @endif
	                </div>   
	            </div>   
				
				<div class="row right-align">	
	            <!--Botão de enviar-->
	            <button class="btn waves-effect waves-light blue col s2 offset-s9" type="submit">Enviar</button>
	            </div>

	        </form>
	    </div>  		
           
            </div>
            
           </div>
        </div>   
    </div>
	  
</div>

@endSection