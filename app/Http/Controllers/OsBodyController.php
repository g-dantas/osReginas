<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OsBodyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $headerOs = DB::table('os_header')
                          ->join('status_os', 'os_header.status_header', 'status_os.id_status')
                          ->select('os_header.data_hora_abertura_header', 'status_os.desc_status')
                          ->where('os_header.id_header_os', $id)
                          ->first();

        $bodyOs = DB::table('os_body')
                    ->join('os_header', 'os_body.id_header_os', 'os_header.id_header_os')
                    ->where('os_body.id_header_os', $id)
                    ->get();

        $os = "OS - ".$id." - Aberta no dia: ".$headerOs->data_hora_abertura_header;
        $status = $headerOs->desc_status;
        $data = $headerOs->data_hora_abertura_header;

        return view('index_body_os', compact('os', 'data', 'bodyOs', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
