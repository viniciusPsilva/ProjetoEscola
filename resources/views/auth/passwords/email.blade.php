@extends('template.template')

@section('content')
<div class="container">
    <!-- card com frmulário de cadastro de usuario-->
    <div class="row">
        <div class="col s12 m8 l8 offset-l2 offset-m2 style-margin-top">
          <div class="card">
            <div class="card-content">
              <span class="card-title blue-text text-darken-2">Reset de Senha</span>
                
    <!--Formulário set de senha email -->
                    <div class="row">
                          <form class="col s12" method="POST" action="{{ route('password.email') }}">
                        @csrf
                            <div class="row">
                                <div class="input-field col s12">
                                  <i class="material-icons prefix green-text text-darken-2">email</i>
                                     <input id="email" type="text" name="email" class="validate" value="{{old('email')}}">
                                         <label for="email">Email</label>

                                          @if ($errors->has('email'))
                                             <span class="red-text text-darken-2">
                                                 <strong>{{ $errors->first('email') }}</strong>
                                             </span>
                                             @endif
                                </div>
             
                
                             </div>

                        
                                <button type="submit" class="btn blue">{{ __('Send Password Reset Link') }}</button>
                            </form>      
                    </div>         
            </div>
            
            </div>
        </div>   
    </div>
</div>
@endsection
