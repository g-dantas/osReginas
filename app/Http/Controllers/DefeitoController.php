<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Defeito;

class DefeitoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $defeitos = Defeito::all();

        return view('index_defeito', compact('defeitos'));
    }

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

        return redirect('/defeitos')->with('success', 'Defeito cadastrado com sucesso');
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

        Defeito::where('id_defeito', $id)
               ->update(['desc_defeito' => $request->desc_defeito]);

        return redirect('/defeitos')->with('success', 'Defeito alterado com sucesso');
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
