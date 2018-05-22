@extends('template.template')

@section('content')
<div class="content">
	<!-- card com formulario de cadastro de presencas-->
    <div class="row">
        <div class="col s12 m6 l6 offset-l3 offset-m3 style-margin-top">
          <div class="card">
            <div class="card-content">
              <span class="card-title blue-text text-darken-2">{{$formTitle or "Cadastro de Presencas"}}
              </span>
        <!--Formulário de cadastro de presencas-->
	    <div class="row">
	    	<!--Testa se a turma foi enviada se foi então esta editando Turma-->
	    	@if(isset($presenca))
	        	<form method="post" class="col s12 m12 l12" action="{{route('presenca.update',$presenca->id)}}">
	        		{!! method_field('PUT') !!}
	        @else
	        	<form method="post" class="col s12 m12 l12" action="{{route('presenca.store')}}">
	        @endif

	            @csrf
	            <!--Nome-->
	            <div class="row">
	                <div class="input-field col s12 m6">
	                    <i class="material-icons prefix green-text text-darken-2">assignment_ind</i>
	                    <input disabled="" id="nome" type="text"  class="validate" value="{{Auth::user()->name}}">
	                    <label for="nome">Professor</label>

	                    @if ($errors->has('nome_instrutor'))
	                        <span class="red-text text-darken-2">
	                            <strong>{{ $errors->first('nome_instrutor') }}</strong>
	                        </span>
	                    @endif
	                </div>  
	                <!--Turma-->
	                <div class="input-field col s12 m6">
	                   <i class="material-icons prefix orange-text text-darken-1">people</i>
	                    <input disabled="" id="nome" type="text" name="nome_instrutor" class="validate" value="{{$turma->nome}}">
	                    <label for="nome">Turma</label>	                
	                </div> 

	               	<input type="hidden" name="turma_id" value="{{$turma->id}}">
	               	<input type="hidden" name="nome_instrutor" value="{{Auth::user()->name}}">
	               	
	            </div>

				
	           <!--alunos-->
	           <label>Alunos Presentes</label>
	            <div class="row">
	                <div class="input-field col s12 m6">
	                    @foreach($alunos as $aluno)		
		                    <p>
      							<label>
        							<input type="checkbox" name="alunos[]" value="{{$aluno->id}}" />
       								 <span>{{$aluno->name}}</span>
      							</label>
    						</p>
    					@endforeach
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