@extends('template.template')

@section('content')
	<!--Card superior-->
	<div class="row">
		<div class="col s12 m8 offset-m2">
			<div class="row">
			    <div class="col s12 m6">
			      <div class="card">
			        <div class="card-content">
			          <span class="card-title">{{$turma->nome}}</span>
			          <p>
			          	<span class="blue-text">Professor: </span>
			          	@if(isset($professores))
				          	 @foreach($professores as $professor)
				          	 	<span class="lista-professor">{{$professor->name}}</span>
							 @endforeach
						@endif
			          </p>
			        </div>			  
			      </div>
			    </div>
  			</div>
		</div>
	</div>
	
	<!--Card inferior-->
	<div class="row">
		<div class="col s12 m8 offset-m2">
			<ul class="collapsible">
				<!-- Lista de Alunos-->
			  <li>
			    <div class="collapsible-header">
			      <i class="material-icons blue-text text-darken-2">group</i>
			      Alunos 
			      <span class="new badge blue lighten-1" data-badge-caption="Alunos na turma"> 	{{count($alunos)}}
			      </span>
			  	</div> 

			    <div class="collapsible-body">
			    	<!--lista de alunos-->
			    	<div class="row">
			    		<div class="col s12">
			    			<div class="collection">
			    			@if(isset($alunos))
					    		@foreach($alunos as $aluno)
						       		<a class="collection-item blue-text text-darken-4">
						       			{{$aluno->name}}
						       		</a>
						        @endForeach
						    @endif
	      					</div>
	      				</div>
					</div>
					<!--Botão para adicionar alunos-->
					<div class="row">
						<div class="col s2 offset-m10">
							<a class="waves-effect waves-light btn " 
								href="{{route('register')}}">
								<i class="material-icons">add</i>
							</a>
						</div>
					</div>

			    </div>
			  </li>
			
			 <!-- Lista de presença-->
			  <li>
			    <div class="collapsible-header">
			      <i class="material-icons blue-text text-darken-2">format_list_bulleted</i>
			      Listas de Presença
			       <span class="new badge blue lighten-1" data-badge-caption="Listas de presenças"> 	@if(isset($presencas)){{count($presencas)}}@endif
			      </span></div>
			    <div class="collapsible-body">
			    	<!--Lista de presenças-->
			    	<div class="row">	
				         <table class="responsive-table highlight">
				    		<thead>
				    			<tr>
				    				<th class="blue-text">data</th>
				    				<th class="blue-text">professor</th>
				    				<th class="blue-text">Alunos presentes</th>
				    				<th class="blue-text">Alunos faltantes</th>
				    				<th class="blue-text">visualizar</th>
				    			</tr>
				    		</thead>
				    		<tbody>
				    			@if(isset($presencas))
					    			@foreach($presencas as $presenca)
					    			<tr>
					    				<th>{{date_format($presenca->created_at, 'd-M-Y')}}</th>
					    				<th>{{$presenca->nome_instrutor}}</th>
					    				<th>{{count($presenca->users)}}</th>
					    				<th>{{count($presenca->getUsuariosFaltaram())}}</th>
					    				<th><a href="{{route('presenca.show', $presenca->id)}}" class="waves-effect waves-light btn yellow accent-3"><i class="material-icons ">remove_red_eye</i></a></th>
					    			</tr>
					    			@endforeach
					    		@endif
				    		</tbody>
				    	</table>			
			    	</div>
					<!--Botão para adicionar presenças-->
					<div class="row">
						<div class="col s2 offset-m10">
							<a class="waves-effect waves-light btn" 
								href="{{route('formPresenca',$turma->id)}}">
								<i class="material-icons">add</i>
							</a>
						</div>
					</div>

			    </div>
			  </li>

			  <!--Lista de atividades-->			  
			  <li>
			    <div class="collapsible-header">
			      <i class="material-icons blue-text text-darken-2">description</i>
			      Listas de Atividades
			       <span class="new badge blue lighten-1" data-badge-caption="Listas de presenças"> 	<!-- MUDAR PARA CONTAR ATIVIDADES-->
			      </span></div>
			    <div class="collapsible-body">
			    	<!--Lista de Lições-->
			    	<div class="row">	
				         <table class="responsive-table highlight">
				    		<thead>
				    			<tr>
				    				<th class="blue-text">Titulo</th>
				    				<th class="blue-text">data</th>				    				
				    				<th class="blue-text">visualizar</th>
				    			</tr>
				    		</thead>
				    		
				    	</table>			
			    	</div>
					<!--Botão para adicionar Lições-->
					<div class="row">
						<div class="col s2 offset-m10">
							<a class="waves-effect waves-light btn" 
								href="{{route('formLicao',$turma->id)}}">
								<i class="material-icons">add</i>
							</a>
						</div>
					</div>

			    </div>
			  </li>
			</ul>
		</div>
	</div>	
@endSection

