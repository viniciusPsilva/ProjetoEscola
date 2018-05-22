@extends('template.template')

@section('content')
<div class="content">
	<!-- card com frmulário de cadastro de usuario-->
    <div class="row">
        <div class="col s12 m6 l6 offset-l3 offset-m3 style-margin-top">
          <div class="card">
            <div class="card-content">
              <span class="card-title blue-text text-darken-2">{{$formTitle or "Cadastro de Lição"}}</span>
              		<!--Formulário de cadastro de usuário-->
	    <div class="row">
	    	<!--Testa se a turma foi enviada se foi então esta editando Turma-->
	    	@if(isset($licao))
	        	<form method="post" class="col s12 m12 l12" enctype="multipart/form-data" action="{{route('licao.update',$licao->id)}}">
	        		{!! method_field('PUT') !!}
	        @else
	        	<form method="post" class="col s12 m12 l12" enctype="multipart/form-data" action="{{route('licao.store')}}">
	        @endif

	            @csrf

	            <!--turma-->
	            <div class="row">
	                <div class="input-field col s12 m6">
	                    <i class="material-icons prefix yellow-text text-darken-2">people</i>
	                    <input id="" type="text" name="" class="validate" value="{{$turma->nome}}" disabled="">
	                    <label for="nome">Turma:</label>
	                    <input type="hidden" value="{{$turma->id}}" name="id_turma">
	                </div> 
					
	            </div>

				<div class="row">
					<!--Titulo-->
	                <div class="input-field col s12 m8">
	                    <i class="material-icons prefix green-text text-darken-2">mode_edit</i>
	                    <input id="titulo" type="text" name="titulo" class="validate" value="{{$licao->titulo or old('titulo')}}">
	                    <label for="nome">Título:</label>

	                    @if ($errors->has('titulo'))
	                        <span class="red-text text-darken-2">
	                            <strong>{{ $errors->first('titulo') }}</strong>
	                        </span>
	                    @endif
	                </div> 
				</div>
				
				  <!--descricao-->
				  <div class="row">				    				      
				        <div class="input-field col s12 m8">
				        	<i class="material-icons prefix red-text text-darken-2">description</i>
				          <textarea id="descricao" name="descricao" class="materialize-textarea"></textarea>
				          <label for="textarea1">Descricão</label>
				        </div>
				  </div>

				  
				 <div class="file-field input-field">
					<div class="file-field input-field col s12 m8">
						<div class="btn">
						    <span>Material</span>
						    <input type="file" name="material[]" multiple>
						</div>      
						<div class="file-path-wrapper">
						        <input class="file-path validate" type="text" placeholder="Upload do materia da lição">
						</div>      
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