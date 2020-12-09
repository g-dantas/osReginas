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
        <h1 class="page-header">OS</h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="row">
        <div class="col-lg-3">
            <div class="panel-body">
            <a type="button" href="{{ route('os_header.create') }}" class="btn btn-primary">Nova OS</a>
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
                    <table class="table table-striped table-bordered table-hover" id="dataTables-os_header">
                        <thead>
                            <tr>
                                <th>Num. OS</th>
                                <th>Usuario</th>
                                <th>Dt. Abertura</th>
                                <th>Defeito</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($oss as $os)
                                <tr>
                                    <td>{{ $os->id }}</td>
                                    <td>{{ $os->nome }}</td>
                                    <td>{{ date('d/m/Y H:i', strtotime($os->data_abertura)) }}</td>
                                    <td>{{ $os->defeito }}</td>
                                    <td>{{ $os->status }}</td>
                                    <td>
                                        <a href="{{ route('os_body.show', $os->id) }}" class="btn btn-primary btn-xs">
                                            <span class="fa fa-align-justify fa-lg"></span>
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
            $('#dataTables-os_header').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
