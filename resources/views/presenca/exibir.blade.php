@extends('template.template')

@section('content')
	<!--Card superior-->
	<div class="row">
		<div class="col s12 m8 offset-m2">
			<div class="row">
			    <div class="col s12 m6">
			      <div class="card">
			        <div class="card-content">
			          <span class="card-title">Lista de Presenca</span>			          
			          <p><span class="blue-text">Turma: {{$turma->nome}}</span></p>
			          <p><span class="blue-text">Professor: {{$presenca->nome_instrutor}} </span></p>
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
			      Alunos Presentes 
			      <span class="new badge blue lighten-1" data-badge-caption="Alunos Presentes"> 	{{count($alunosPresentes)}}
			      </span>
			  	</div> 

			    <div class="collapsible-body">
			    	<!--lista de alunos-->
			    	<div class="row">
			    		<div class="col s12">
			    			<div class="collection">
			    		@foreach($alunosPresentes as $aluno)
				       		<a class="collection-item blue-text text-darken-4">
				       			{{$aluno->name}}
				       		</a>
				        @endForeach
	      					</div>
	      				</div>
					</div>
			    </div>
			  </li>
			
			 <!-- Lista de presença-->
			  <li>
			    <div class="collapsible-header">
			      <i class="material-icons blue-text text-darken-2">group</i>
			      Alunos que faltaram
			       <span class="new badge blue lighten-1" data-badge-caption="Alunos faltantes"> 	{{count($alunosFaltantes)}}
			      </span></div>
			    <div class="collapsible-body">
			    	<!--lista de alunos-->
			    	<div class="row">
			    		<div class="col s12">
			    			<div class="collection">
			    		@foreach($alunosFaltantes as $aluno)
				       		<a class="collection-item blue-text text-darken-4">
				       			{{$aluno->name}}
				       		</a>
				        @endForeach
	      					</div>
	      				</div>
					</div>
			    </div>
			  </li>
			</ul>
		</div>
	</div>	
@endSection

