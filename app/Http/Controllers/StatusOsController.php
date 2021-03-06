<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StatusOS;

class StatusOsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = StatusOS::all();

        return view('index_status_os', compact('status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_status_os');
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
            'desc_status' => 'required|max:50',
        ]);

        $status = StatusOS::create($validateData);

        if ($status) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('msg', 'Status cadastrado com sucesso.');
        } else {
            $request->session()->flash('status', 'error');
            $request->session()->flash('msg', 'Erro ao cadastrar status.');
        }

        return redirect('/status_os');
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
        $status = StatusOS::findOrFail($id);

        return view('edit_status_os', compact('status'));
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
            'desc_status' => 'required|max:50'
        ]);

        $update = StatusOS::where('id_status', $id)
                ->update(['desc_status' => $request->desc_status]);

        if ($update) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('msg', 'Status alterado com sucesso.');
        } else {
            $request->session()->flash('status', 'error');
            $request->session()->flash('msg', 'Erro ao alterar status.');
        }

        return redirect('/status_os')->with('success', 'Status alterado com sucesso');
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
