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
                    Nova OS
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" method="post" action="{{ route('os_header.store') }}">
                                <div class="form-group">
                                    <label>Defeito</label>
                                    <select class="form-control" name="id_defeito_header" id="id_defeito_header">
                                        @foreach($defeitos as $defeito)
                                        <option value="{{$defeito->id_defeito}}">{{$defeito->desc_defeito}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    @csrf
                                    <textarea name="texto_body" id="texto_body" rows="5" class="form-control"
                                              placeholder="Relate o problema aqui..."></textarea>
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