@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Tarik Data Pelajar SKM
@endsection

@section('topButton')
    {{--@if (Auth::user()->access_power >= 2000)--}}
        {{--<a href="/board/fetch-data" class="btn btn-link btn-float has-text">--}}
            {{--<i class="icon-user-tie text-primary"></i>--}}
            {{--<span>Tarik Data SKM</span>--}}
        {{--</a>--}}
    {{--@endif--}}
    {{--@if (Auth::user()->access_power >= 1000)--}}
    {{--<a href="#" class="btn btn-link btn-float has-text">--}}
    {{--<i class="icon-coin-dollar text-primary"></i>--}}
    {{--<span>Bayaran</span>--}}
    {{--</a>--}}
    {{--@endif--}}
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            {{--@if (Auth::user()->access_power >= 1000)--}}
            <div class="row">
                <h3>Jenis Data : </h3>
                {{--<div class="col-md-3 col-xs-6 thumbnail">--}}
                {{--<img class="img-responsive img-rounded" src="{{ url('') }}/images/dashboard/audit-min.jpg">--}}
                {{--<a href="/board/state/ppt" class="btn btn-info btn-block" style="margin-top: 4px">PPT</a>--}}
                {{--</div>--}}

                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/dashboard/lookups-min.jpg">
                    <a href="{{ url('') }}/api/pelajar" class="btn btn-info btn-block" style="margin-top: 4px">PENGAJIAN LAIN</a>
                </div>
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/dashboard/target-min.jpg">
                    <a href="{{ url('') }}/api/board/pelajar" class="btn btn-info btn-block" style="margin-top: 4px">PUSAT
                        BERTAULIAH</a>
                </div>
                {{--<div class="col-md-3 col-xs-6 thumbnail">--}}
                {{--<img class="img-responsive img-rounded" src="{{ url('') }}/images/dashboard/user-min.jpg">--}}
                {{--<a href="/board/state/sldn" class="btn btn-info btn-block" style="margin-top: 4px">SLDN</a>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
    </div>
@endsection

@section('footer_script')
@endsection
