<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = Departamento::all();

        return view('index_departamento', compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_departamento');
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
            'desc_depto' => 'required|max:45',
        ]);

        $departamento = Departamento::create($validateData);

        if ($departamento) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('msg', 'Departamento cadastrado com sucesso.');
        } else {
            $request->session()->flash('status', 'error');
            $request->session()->flash('msg', 'Erro ao cadastrar departamento.');
        }

        return redirect('/departamentos');
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
        $departamento = Departamento::findOrFail($id);

        return view('edit_departamento', compact('departamento'));
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
            'desc_depto' => 'required|max:45'
        ]);

        $update = Departamento::where('id_depto', $id)
                              ->update(['desc_depto' => $request->desc_depto]);

        if ($update) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('msg', 'Departamento alterado com sucesso.');
        } else {
            $request->session()->flash('status', 'error');
            $request->session()->flash('msg', 'Erro ao alterar departamento.');
        }

        return redirect('/departamentos');
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
