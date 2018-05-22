<?php

namespace Escola\Http\Controllers\Auth;

use Escola\User;
use Escola\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

   use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' =>  'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'tipo' =>  'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Escola\User
     */
    protected function create(array $data)
    {
        
        $user =  User::create([
            'name'  => $data['name'],
            'email' => $data['email'],
            'tipo'  => $data['tipo'],
            'password' => Hash::make($data['password']),
        ]);
        
        if (array_key_exists('turmas', $data)) {
            //recupera os ids das turma passadas pelo form
            $turmas = $data['turmas'];
            //sincroniza o usuario com a turma 
            $user->turmas()->sync($turmas);
            }    
           
        
        
        

        return $user;
    }
}
