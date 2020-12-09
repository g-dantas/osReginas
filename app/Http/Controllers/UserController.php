<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = DB::table('users')
                      ->where('usuario_ativo', 'S')
                      ->get();

        return view('index_user', compact('usuarios'));
    }

    public function desativa($id, Request $request)
    {
        $desativa = DB::table('users')
                      ->where('id', $id)
                      ->update(['usuario_ativo' => 'N']);

        if ($desativa) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('msg', 'Usuário desativado com sucesso.');
        } else {
            $request->session()->flash('status', 'error');
            $request->session()->flash('msg', 'Erro ao desativar usuário.');
        }

        return redirect('/user/index');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
