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

    public function desativa($id)
    {
        $desativa = DB::table('users')
                      ->where('id', $id)
                      ->update(['usuario_ativo' => 'N']);

        if ($desativa) {
            return redirect('/user/index')->with('success', 'Usuário desativado com sucesso');
        } else {
            return redirect('/user/index')->with('error', 'Erro ao desativar o usuário');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
