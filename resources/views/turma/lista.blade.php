@extends('template.template')

@section('content')
<div class="container">
	<div class="row style-margin-top" >
		 <h1 class="list-title blue-text">Lista de Turmas</h1>
		@foreach($turmas as $turma)
    	<div class="col s12 m6 l4">
        <a href="{{route('turma.show',$turma->id)}}">
      		<div class="card hoverable">
        		<div class="card-content">
          			<span class="card-title center">{{$turma->nome}}</span>
        		</div>
       		 	<div class="card-action center">
          			<a class="btn white yellow-text text-accent-4" href="{{ route('turma.edit', $turma->id ) }}">
          				<i class="material-icons yellow-text text-accent-4">mode_edit</i>
          			</a>

          			<form class="form-delete" method="Post" action="{{route('turma.destroy',$turma->id)}}">
       					{!! method_field('DELETE') !!}
       				 	@csrf
        			<button class="btn white"  type="submit"><i class="material-icons red-text text-darken-5">delete</i>
        			</button>
   					</form>

        		</div>
      		</div>
          </a>
    	</div>
    	@endforeach
	</div>
</div>
@endSection
