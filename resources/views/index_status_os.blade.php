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
        <h1 class="page-header">Status OS</h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="row">
        <div class="col-lg-3">
            <div class="panel-body">
            <a type="button" href="{{ route('status_os.create') }}" class="btn btn-primary">Novo Status</a>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-status_os">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Status</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($status as $os)
                                <tr>
                                    <td>{{ $os->id_status }}</td>
                                    <td>{{ $os->desc_status }}</td>
                                    <td>
                                        <a href="{{ route('status_os.edit', $os->id_status) }}" class="btn btn-success btn-xs">
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
            $('#dataTables-status_os').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
2
