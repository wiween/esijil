@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Senarai Agihan Semula ( Aktiviti Penggantian )
@endsection

@section('topButton')
    {{--<a href="/printreplacement/print" class="btn btn-link btn-float has-text">--}}
    {{--<i class="icon-printer2 text-primary"></i>--}}
    {{--<span>Cetak Senarai Ini</span>--}}
    {{--</a>--}}
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 table-responsive">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>No ID</th>
                            <th>Name</th>
                            <th>Batch No</th>
                            <th>Sebab Penggantian</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($replacements as $replacement)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $replacement->certificate->ic_number }}</td>
                                <td><a href="{{ url('') }}/replacement/show/{{ $replacement->id }}">{{ $replacement->certificate->name }}</a> </td>
                                <td>{{ $replacement->certificate->batch_id }}</td>
                                <td>{{ $replacement->type_replacement }}</td>
                                <td>
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="{{ url('') }}/certificate/agih/{{ $replacement->id }}"><i class="icon-pencil text-success"></i>Agih Semula</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
@endsection
