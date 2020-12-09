@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Departamentos</h1>
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
                Editar Departamento
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" method="post" action="{{ route('departamentos.update', $departamento->id_depto) }}">
                            <div class="form-group">
                                @csrf
                                @method('PATCH')
                                <label>Departamento</label>
                                <input class="form-control" name="desc_depto" id="desc_depto" value="{{ $departamento->desc_depto }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Editar</button>
                            <a type="button" class="btn btn-warning" href="{{ route('departamentos.index') }}">Cancelar</a>
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
