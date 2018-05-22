@extends('template.template')

@section('content')
<div class="container">
    <!-- card com frmulário de cadastro de usuario-->
    <div class="row">
        <div class="col s12 m7 l7 offset-l2 offset-m2 style-margin-top">
          <div class="card">
            <div class="card-content">
              <span class="card-title blue-text text-darken-2">Login</span>
                <div class="row">
                   <!--Formulário de login-->
                    <form method="POST" class="col s12" action="{{ route('login') }}">
                        
                        @csrf
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix yellow-text text-darken-2">email</i>
                                <input class="validate" id="email" name="email" type="email" value="{{ old('email') }} ">
                                <label data-error="email inválido" data-success="Email válido"  for="email">{{ __('E-Mail Address') }}</label>

                                @if ($errors->has('email'))
                                    <span class="red-text text-darken-2"> <strong>{{ $errors->first('email') }}</strong> </span>
                                @endif

                            </div>

                            <div class="input-field col s12">
                                <i class="material-icons prefix red-text text-darken-2">lock</i>
                                <input  id="password" name="password" type="password"  value="{{ old('email') }}">
                                <label for="password">{{ __('Password') }}</label>

                                @if ($errors->has('password'))
                                    <span class="red-text text-darken-2"> <strong> {{ $errors->first('password') }} </strong> </span>
                                @endif

                            </div>
                            <div class="input-field col s12">
                                <p>
                                    <label>
                                        <input type="checkbox" name="remember" class="filled-in" {{ old('remember') ? 'checked' : '' }} />
                                        <span>{{ __('Remember Me') }}</span>
                                    </label>
                                </p>
                            </div>


                            <button class="btn waves-effect waves-light blue col s12 m12 l5 left" type="submit" name="action">{{ __('Login') }}</button>

                            <a class="btn waves-effect waves-light blue col s12 m12 l5 right" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>

                    </form>     
                </div>         
            </div>
            
            </div>
        </div>   
    </div>
</div>
@endsection






