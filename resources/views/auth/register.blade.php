@extends('template.template')

@section('content')
<div class="container">
    <!-- card com frmulário de cadastro de usuario-->
    <div class="row">
        <div class="col s12 m8 l8 offset-l2 offset-m2 style-margin-top">
          <div class="card">
            <div class="card-content">
              <span class="card-title blue-text text-darken-2">Cadastro de usuário</span>
                
    <!--Formulário de cadastro de usuário-->
    <div class="row">
        @if(isset($user))
            <form method="post" class="col s12 m12 l12" action="{{ route('user.update', $user->id) }}">
                
        @else
            <form method="post" class="col s12 m12 l12" action="{{ route('register') }}">
        @endif
        
            <!--Tipo de usuario-->
                <div class="input-field col s6">
                <select name="tipo" @if(isset($user) && $user->tipo === "aluno")
                     disabled @endif>
                     <option disabled >Escolha uma opção</option>
                     
                      @foreach($tipoUsuario as $tipo)
                            
                      <option value="{{$tipo}}" @if(isset($user) && $tipo === $user->tipo) 
                        selected @endif > {{$tipo}}</option>
                      @endForeach
                 </select>
             <label>Tipo de usuário</label>

              @if ($errors->has('tipo'))
                        <span class="red-text text-darken-2">
                            <strong>{{ $errors->first('tipo') }}</strong>
                        </span>
                    @endif
            </div>

            <!--Turma do usuario-->
                <div class="input-field col s6">
                <select name="turmas[]" multiple="" @if(isset($user) && $user->tipo === "aluno")
                     disabled @endif>
                     <option disabled >Escolha uma opção</option>
                     
                      @foreach($turmas as $turma)
                            
                      <option value="{{$turma->id}}" @if(isset($user) && $turma === $user->turmas) 
                        selected @endif > {{$turma->nome}}</option>
                      @endForeach
                 </select>
             <label>Turma: </label>

              @if ($errors->has('turma'))
                        <span class="red-text text-darken-2">
                            <strong>{{ $errors->first('turma') }}</strong>
                        </span>
                    @endif
            </div>

            @csrf
            <!--Nome-->
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix green-text text-darken-2">account_circle</i>
                    <input id="name" type="text" name="name" class="validate" value="{{$user->name or old('name')}}">
                    <label for="name">Nome</label>

                    @if ($errors->has('name'))
                        <span class="red-text text-darken-2">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <!--Email-->
                <div class="input-field col s6">
                    <i class="material-icons prefix yellow-text text-darken-2">email</i>
                    <input id="email" type="email" name="email" class="validate" value="{{$user->email or old('email')}}">
                    <label for="email">Email</label>
                    @if ($errors->has('email'))
                        <span class="red-text text-darken-2">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                        </div>
                </div>

            <!--Senha-->
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix red-text text-darken-2">lock</i>
                    <input id="password" name="password" type="password" class="validate">
                    <label for="password">Password</label>
                    @if ($errors->has('password'))
                        <span class="red-text text-darken-2">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <!--password-confirm-->
                <div class="input-field col s6">
                    <i class="material-icons prefix blue-text text-darken-2">lock</i>
                    <input id="password-confirm" name="password_confirmation" type="password" class="validate">
                    <label for="password-confirm">Password</label>
                </div>
            </div>


            
            <!--Botão de enviar-->
            <button class="btn waves-effect blue" type="submit">Cadastrar-se</button>

        </form>
                         </div>         
                    </div>
            
                </div>
        </div>   
    </div>
</div>

<!--Js do formulário-->
<script>
     $(document).ready(function(){
        //ativa os campos select do form
    $('select').formSelect();
  });
</script>
@endsection
