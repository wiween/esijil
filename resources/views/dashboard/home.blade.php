@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Inbox
@endsection

@section('topButton')
   @endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            {{--@if (Auth::user()->access_power >= 1000)--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-3 col-xs-6 thumbnail">--}}
                        {{--<img class="img-responsive img-rounded" src="/images/dashboard/audit-min.jpg">--}}
                        {{--<a href="/admin/course" class="btn btn-info btn-block" style="margin-top: 4px">Cetak Sijil</a>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-3 col-xs-6 thumbnail">--}}
                        {{--<img class="img-responsive img-rounded" src="/images/dashboard/lookups-min.jpg">--}}
                        {{--<a href="/admin/session" class="btn btn-info btn-block" style="margin-top: 4px">Carian</a>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3 col-xs-6 thumbnail">--}}
                        {{--<img class="img-responsive img-rounded" src="/images/dashboard/statistic-min.jpg">--}}
                        {{--<a href="/admin/monthlyreport" class="btn btn-info btn-block" style="margin-top: 4px">Laporan</a>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3 col-xs-6 thumbnail">--}}
                        {{--<img class="img-responsive img-rounded" src="/images/dashboard/user-min.jpg">--}}
                        {{--<a href="/admin/report/chart" class="btn btn-info btn-block" style="margin-top: 4px">Admin</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            <div>
                <hr>
            </div>
            <div>
                <h3>My Inbox</h3>
            </div>
            <div>
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>No Batch</th>
                        <th>Negeri</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($certificates as $certificate)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td><a href="/print/print-list/{{ $certificate->batch_id }}">{{ $certificate->batch_id }}</a></td>
                        <td>{{ $certificate->state->name }}</td>
                        <td>
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="/print/show/{{ $certificate->id }}"><i class="icon-display text-primary"></i>Lihat & Edit</a></li>
                                        {{--<li><a href="/certificate/job/{{ $certificate->id }}"><i class="icon-display text-primary"></i>Agihan Tugasan</a></li>--}}
                                        <li><a href="/print/print/{{ $certificate->id }}"><i class="icon-printer text-success"></i>Cetak</a></li>
                                        <li><a href="/print/destroy/{{ $certificate->id }}"><i class="icon-trash text-danger-600"></i>Hapus</a></li>
                                        {{--<li><a href="/print/set-flag/Y/{{ $certificate->id }}"><i class="icon-flag8 text-black-600"></i>Set Flag Cetak</a></li>--}}
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
