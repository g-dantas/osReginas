<?php

namespace App\Http\Controllers;

use App\OsBody;
use App\OsHeader;
use Carbon\Carbon;
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
        $validateData = $request->validate([
            'status_header' => 'required',
            'texto_body' => 'required'
        ]);

        $novoStatus = $request->status_header;
        $textoBody = $request->texto_body;
        $idOs = $request->id_header_os;
        $dataOsBody = Carbon::now('America/Sao_Paulo');

        $body = new OsBody();
        $body->id_header_os = $idOs;
        $body->data_os_body = $dataOsBody;
        $body->id_usuario_body = 1;
        $body->texto_body = $textoBody;
        $insertBody = $body->save();

        if ($insertBody) {
            $updateStatus = DB::table('os_header')
                ->where('id_header_os', $idOs)
                ->update(['status_header' => $novoStatus]);
        } else {
            return redirect('/os_header')->with('error', 'Erro ao cadastrar um novo atendimento');
        }

        if ($updateStatus) {
            return redirect('/os_header')->with('success', 'Novo atendimento cadastrado com sucesso');
        } else {
            return redirect('/os_header')->with('error', 'Erro ao alterar o status da OS');
        }
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
                          ->select('os_header.data_hora_abertura_header', 'status_os.desc_status', 'os_header.status_header')
                          ->where('os_header.id_header_os', $id)
                          ->first();

        $bodyOs = DB::table('os_body')
                    ->join('os_header', 'os_body.id_header_os', 'os_header.id_header_os')
                    ->where('os_body.id_header_os', $id)
                    ->orderBy('os_body.id_os_body', 'desc')
                    ->get();

        $os = "OS - ".$id." - Aberta no dia: ".$headerOs->data_hora_abertura_header;
        $status = $headerOs->desc_status;
        $idStatus = $headerOs->status_header;
        $data = $headerOs->data_hora_abertura_header;

        return view('index_body_os', compact('os', 'data', 'bodyOs', 'status', 'idStatus', 'id'));
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

    public function emAtendimento($id)
    {
        $update = DB::table('os_header')
                    ->where('id_header_os', $id)
                    ->update(['status_header' => 2]);

        if ($update) {
            return redirect('/os_header')->with('success', 'Status da OS alterado para Em Andamento');
        } else {
            return redirect('/os_header')->with('error', 'Erro ao alterar o status da OS');
        }
    }

    public function novoAtendimento($id)
    {
        $statusOs = DB::table('os_header')
            ->join('status_os', 'os_header.status_header', 'status_os.id_status')
            ->select('os_header.status_header', 'status_os.desc_status', 'os_header.id_header_os')
            ->where('os_header.id_header_os', $id)
            ->first();

        $status = DB::table('status_os')
                    ->whereNotIn('id_status', [1, $statusOs->status_header])
                    ->get();

        $idStatusAtual = $statusOs->status_header;
        $descStatusAtual = $statusOs->desc_status;
        $numOs = $statusOs->id_header_os;

        return view('create_body_os', compact('status', 'idStatusAtual', 'descStatusAtual', 'numOs'));
    }

    public function confirmaFinalizacao($id)
    {
        $updateFinaliza = DB::table('os_header')
                            ->where('id_header_os', $id)
                            ->update(['status_header' => 5]);

        if ($updateFinaliza) {
            return redirect('/os_header')->with('success', 'OS finalizada com sucesso');
        } else {
            return redirect('/os_header')->with('error', 'Erro ao finalizar a OS');
        }
    }
}
