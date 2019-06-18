<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;

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
    //protected $redirectTo = '/os_header';
    protected function redirectTo() {

        if (Auth::user()->id_tp_usuario == 1) {
            return '/os_header/monitoramento';
        } else {
            return '/os_header';
        }
    }
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
            'name' => ['required', 'string', 'max:255'],
            'id_tp_usuario' => ['required'],
            'id_departamento' => ['required'],
            'login' => ['required', 'string'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'id_tp_usuario' => $data['id_tp_usuario'],
            'id_departamento' => $data['id_departamento'],
            'login' => $data['login'],
            'password' => Hash::make($data['password']),
            'usuario_ativo' => 'S'
        ]);
    }

    public function showRegistrationForm()
    {

        $departamentos = DB::table('departamentos')->get();

        return view('auth.register', compact('departamentos'));
    }
}
