<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Defeito;
use Illuminate\Support\Facades\Auth;

class DefeitoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()
    {
        $defeitos = Defeito::all();

        return view('index_defeito', compact('defeitos'));
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_defeito');
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
            'desc_defeito' => 'required|max:45',
        ]);

        $defeito = Defeito::create($validateData);

        if ($defeito) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('msg', 'Defeito cadastrado com sucesso.');
        } else {
            $request->session()->flash('status', 'error');
            $request->session()->flash('msg', 'Erro ao cadastrar defeito.');
        }

        return redirect('/defeitos');
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
        $defeito = Defeito::findOrFail($id);

        return view('edit_defeito', compact('defeito'));
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
            'desc_defeito' => 'required|max:45'
        ]);

        $update = Defeito::where('id_defeito', $id)
                         ->update(['desc_defeito' => $request->desc_defeito]);

        if ($update) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('msg', 'Defeito alterado com sucesso.');
        } else {
            $request->session()->flash('status', 'error');
            $request->session()->flash('msg', 'Erro ao alterar defeito.');
        }

        return redirect('/defeitos');
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
