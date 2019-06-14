@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">OS</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="panel-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
        </div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Novo Atendimento - OS: {{$numOs}}
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" method="post" action="{{ route('os_body.store') }}">
                                <input type="hidden" name="id_header_os" id="id_header_os" value="{{$numOs}}">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status_header" id="status_header">
                                        <option value="{{$idStatusAtual}}" selected>{{$descStatusAtual}}</option>
                                        @foreach($status as $st)
                                            <option value="{{$st->id_status}}">{{$st->desc_status}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    @csrf
                                    <textarea name="texto_body" id="texto_body" rows="5" class="form-control"
                                              placeholder="Relate o que foi feito no atendimento..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <a type="button" class="btn btn-warning" href="{{ route('os_header.index') }}">
                                    Cancelar</a>
                            </form>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection
