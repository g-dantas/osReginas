@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Atendimentos OS</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            {{$os}}  <b>Status: {{$status}}</b>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <ul class="timeline">
                @php
                    $class = "";
                @endphp
                @foreach($bodyOs as $body)
                    <li class="{{$class}}">
                        <div class="timeline-badge success"><i class="fa fa-check"></i>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <p>
                                    <small class="text-muted"><i class="fa fa-clock-o"></i>{{$body->data_os_body}}
                                    </small>
                                </p>
                            </div>
                            <div class="timeline-body">
                                <p>{{$body->texto_body}}</p>
                            </div>
                        </div>
                    </li>
                    @if ($class == "timeline-inverted")
                        @php
                            $class = "";
                        @endphp
                    @else
                        @php
                            $class = "timeline-inverted";
                        @endphp
                    @endif
                @endforeach
            </ul>
        </div>
        <!-- /.panel-body -->
            <div class="panel-footer">
                @if ($idStatus == 4)
                <form role="form" method="post" action="{{ route('os_body.confirma_finalizacao', $id) }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">Confirma Finalização?</button>
                </form>
                @endif
                <a type="button" class="btn btn-warning" href="{{ route('os_header.index') }}">Voltar</a>
            </div>
    </div>
    <!-- /.panel -->
@endsection
