@extends('template.template')

@section('content')
<div class="row">
    <div class="col s12 m6 offset-m3">
      <div class="card">
        <div class="card-image">
          <img class="" src="{{url('img/perfil.jpg')}}">
          <span class="card-title">Perfil</span>
          <a href="{{route('user.edit', $user->id )}}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">edit</i></a>
        </div>
        <div class="card-content">
         	<table class="striped">
         		<tr>
         			<td> <i class="medium material-icons green-text text-darken-2">account_circle</i>
         				Nome : {{$user->name}}</td>
         			<td><i class="medium material-icons yellow-text text-darken-2">email</i>
         				Email : {{$user->email}}</td>
         		</tr>
            <tr>
              <td> <i class="medium material-icons orange-text text-darken-1">people</i>
                Suas Turmas :  @foreach($turmasUser as $turma) {{ $turma->nome." | " }} @endForeach</td> 
            </tr>
           
         		<tr>
         			<td><i class="medium material-icons blue-text text-darken-2">assignment_ind</i>Tipo de usuario : {{$user->tipo}}</td>
         			<td><i class="medium material-icons red-text text-darken-2">lock</i>Senha : ******</td>
         		</tr>
         	</table>
        </div>
      </div>
    </div>
  </div>

@endSection