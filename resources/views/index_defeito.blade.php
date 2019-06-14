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
        <h1 class="page-header">Defeitos</h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="row">
        <div class="col-lg-3">
            <div class="panel-body">
            <a type="button" href="{{ route('defeitos.create') }}" class="btn btn-primary">Novo Defeito</a>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-defeito">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Defeito</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($defeitos as $defeito)
                                <tr>
                                    <td>{{ $defeito->id_defeito }}</td>
                                    <td>{{ $defeito->desc_defeito }}</td>
                                    <td>
                                        <a href="{{ route('defeitos.edit', $defeito->id_defeito) }}" class="btn btn-success btn-xs">
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
            $('#dataTables-defeito').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
