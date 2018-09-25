@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Pengesahan Bayaran Oleh Syarikat : Pegawai Pengesah
@endsection

@section('topButton')

@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Batch ID</th>
                            <th>Negeri</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($certificates as $certificate)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><a href="{{ url('') }}/finance/detail/{{ $certificate->batch_id }}">{{ $certificate->batch_id }}</a></td>
                                <td>{{ $certificate->state->name }}</td>
                                <td>
                                <ul class="icons-list">
                                <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="{{ url('') }}/finance/report-f/{{ $certificate->batch_id }}/{{ $certificate->type }}"><i class="icon-file-pdf text-primary"></i>Laporan F</a></li>
                                    <li><a href="{{ url('') }}/finance/create/{{ $certificate->batch_id }}"><i class="icon-flag4 text-primary"></i>Pengesahan</a></li>
                                    <li><a href="{{ url('') }}/finance/report-g/{{ $certificate->batch_id }}/{{ $certificate->type }}"><i class="icon-file-pdf text-primary"></i>Laporan G</a></li>

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
