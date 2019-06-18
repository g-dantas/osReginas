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
            <h1 class="page-header">Usuários</h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-usuario">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Login</th>
                                <th>Nome</th>
                                <th>Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->id }}</td>
                                    <td>{{ $usuario->login }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>
                                        <form class="form-horizontal" action="{{ route('user.desativa', $usuario->id) }}" method="post" style="display: inline">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="_method" value="PUT">
                                            <button type="submit" class="btn btn-danger btn-xs">
                                                <span class="fa fa-trash fa-lg"></span>
                                            </button>
                                        </form>
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
            $('#dataTables-usuario').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
2
