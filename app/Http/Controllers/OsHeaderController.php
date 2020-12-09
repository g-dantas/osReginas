<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\OsHeader;
use App\OsBody;
use Illuminate\Support\Facades\URL;

class OsHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Auth::user()->id_tp_usuario == 2) {
            $oss = DB::table('os_header')
                     ->join('status_os', 'os_header.status_header', 'status_os.id_status')
                     ->join('users', 'os_header.id_usuario_header', 'users.id')
                     ->join('defeitos', 'os_header.id_defeito_header', 'defeitos.id_defeito')
                     ->where('os_header.id_usuario_header', Auth::user()->id)
                     ->select('os_header.id_header_os as id',
                        'users.name as nome',
                        'os_header.data_hora_abertura_header as data_abertura',
                        'defeitos.desc_defeito as defeito',
                        'os_header.fila_atendimento_header as fila',
                        'status_os.desc_status as status',
                        'status_os.id_status as id_status')
                     ->get();
        } else {
            $oss = DB::table('os_header')
                     ->join('status_os', 'os_header.status_header', 'status_os.id_status')
                     ->join('users', 'os_header.id_usuario_header', 'users.id')
                     ->join('defeitos', 'os_header.id_defeito_header', 'defeitos.id_defeito')
                     ->select('os_header.id_header_os as id',
                        'users.name as nome',
                        'os_header.data_hora_abertura_header as data_abertura',
                        'defeitos.desc_defeito as defeito',
                        'os_header.fila_atendimento_header as fila',
                        'status_os.desc_status as status',
                        'status_os.id_status as id_status')
                     ->get();
        }



        return view('index_header_os', compact('oss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = URL::previous();
        $caminho = explode("/", $url);
        $caminho = $caminho[3];

        $defeitos = DB::table('defeitos')->get();
        $usuarios= "";

        if (Auth::user()->id_tp_usuario == 1) {
            $usuarios = DB::table('users')
                          ->where('users.usuario_ativo', 'S')
                          ->select('users.id', 'users.name')
                          ->get();
        }

        return view('create_header_os', compact('defeitos', 'usuarios', 'caminho'));
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
            'id_defeito_header' => 'required',
            'texto_body' => 'required'
        ]);

        $idDefeito = $request->id_defeito_header;
        $textoBody = $request->texto_body;
        $dataAbertura = Carbon::now('America/Sao_Paulo');

        $header = new OsHeader();

        if (isset($request->id_usuario_header)) {
            $usuarioId = $request->id_usuario_header;
        } else {
           $usuarioId = Auth::user()->id;
        }

        $header->id_usuario_header = $usuarioId;
        $header->data_hora_abertura_header = $dataAbertura;
        $header->status_header = 1;
        $header->fila_atendimento_header = 1;
        $header->id_defeito_header = $idDefeito;
        $insertHeader = $header->save();

        if ($insertHeader) {
            $body = new OsBody();
            $body->id_header_os = $header->id_header_os;
            $body->data_os_body = $dataAbertura;
            $body->id_usuario_body = $usuarioId;
            $body->texto_body = $textoBody;
            $insertBody = $body->save();
        } else {
            $request->session()->flash('status', 'danger');
            $request->session()->flash('msg', 'Erro ao cadastrar a OS.');

            return redirect('/os_header');
        }

        if ($insertBody) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('msg', 'OS cadastrada com sucesso.');

            return redirect('/os_header');
        } else {
            $request->session()->flash('status', 'error');
            $request->session()->flash('msg', 'Erro ao lançar o atendimento da OS.');

            return redirect('/os_header');
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

    public function monitoramento()
    {
        $oss = DB::table('os_header')
            ->join('status_os', 'os_header.status_header', 'status_os.id_status')
            ->join('users', 'os_header.id_usuario_header', 'users.id')
            ->join('defeitos', 'os_header.id_defeito_header', 'defeitos.id_defeito')
            ->whereNotIn('os_header.status_header', [5, 6])
            ->select('os_header.id_header_os as id',
                'users.name as nome',
                'os_header.data_hora_abertura_header as data_abertura',
                'defeitos.desc_defeito as defeito',
                'os_header.fila_atendimento_header as fila',
                'status_os.desc_status as status',
                'status_os.id_status as id_status')
            ->get();

        return view('index_monitoramento_os', compact('oss'));
    }
}
