<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoUsuario;

class TipoUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = TipoUsuario::all();

        return view('index_tipo_usuario', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_tipo_usuario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'desc_tp_usuario' => 'required|max:50',
        ]);

        $tipoUsuario = TipoUsuario::create($validateData);

        if ($tipoUsuario) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('msg', 'Tipo de usuário cadastrado com sucesso.');
        } else {
            $request->session()->flash('status', 'error');
            $request->session()->flash('msg', 'Erro ao cadastrar tipo de usuário.');
        }

        return redirect('/tipos_usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo = TipoUsuario::findOrFail($id);

        return view('edit_tipo_usuario', compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'desc_tp_usuario' => 'required|max:50'
        ]);

        $update = TipoUsuario::where('id_tp_usuario', $id)
                             ->update(['desc_tp_usuario' => $request->desc_tp_usuario]);

        if ($update) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('msg', 'Tipo de usuário alterado com sucesso.');
        } else {
            $request->session()->flash('status', 'error');
            $request->session()->flash('msg', 'Erro ao alterar tipo de usuário.');
        }

        return redirect('/tipos_usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
