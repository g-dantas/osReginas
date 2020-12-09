@extends('layouts.app')
@section('css')
    <!-- DataTables CSS -->
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('css/dataTables.responsive.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Departamentos</h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="row">
        <div class="col-lg-3">
            <div class="panel-body">
            <a type="button" href="{{ route('departamentos.create') }}" class="btn btn-primary">Novo Departamento</a>
            </div>
        </div>
        <div class="col-lg-12">
            @if(session('status') != null)
                <div class="panel-body">
                    @if (session('status') == 'success')
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{session('msg')}}.
                        </div>
                    @else
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{session('msg')}}.
                        </div>
                    @endif
                </div>
            @endif
        </div>
        <div class="col-lg-12">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-departamento">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Departamento</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departamentos as $departamento)
                                <tr>
                                    <td>{{ $departamento->id_depto }}</td>
                                    <td>{{ $departamento->desc_depto }}</td>
                                    <td>
                                        <a href="{{ route('departamentos.edit', $departamento->id_depto) }}" class="btn btn-success btn-xs">
                                            <span class="fa fa-edit fa-lg"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

</div>
@endsection
@section('js')
    <!-- DataTables JavaScript -->
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-departamento').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
