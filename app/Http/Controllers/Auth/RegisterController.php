<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'nombres' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nombres' => $data['nombres'],
            'email' => $data['email'],
            'lider_id' => $data['lider_id'],
            'codigo_registro' => $data['codigo_registro'],
            'password' => Hash::make($data['password']),
        ]);
    }
    
    public function ViewCompleteRegister()
    {
        return view('auth.complete-register');
    }

    public function ViewRegister($codigo_registro)
    {
        $lider = User::join('niveles', 'users.nivel_id', '=', 'niveles.id')
        ->select('users.id AS id_lider','users.*','niveles.*')
        ->where('users.codigo_registro', $codigo_registro)->first();

        //alfanumerico aleatorio
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $codigo_registro = substr(str_shuffle($permitted_chars), 0, 9);
        
        //FALTA VALIDAR QUE ESTE CODIGO NO SE REPITA

        return view('auth.register', ['lider' => $lider, 'codigo_registro'=> $codigo_registro]);
    }
}
