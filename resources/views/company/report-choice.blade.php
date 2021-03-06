@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
   Laporan
@endsection

@section('topButton')

@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            {{--@if (Auth::user()->access_power >= 1000)--}}
            <div class="row">
                <h3>Jenis Pentauliahan : </h3>
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/dashboard/audit-min.jpg">
                    <a href="{{ url('') }}/company-report/ppt" class="btn btn-info btn-block" style="margin-top: 4px">PPT</a>
                </div>

                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/dashboard/lookups-min.jpg">
                    <a href="{{ url('') }}/company-report/ndt" class="btn btn-info btn-block" style="margin-top: 4px">NDT</a>
                </div>
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/dashboard/target-min.jpg">
                    <a href="{{ url('') }}/company-report/pb" class="btn btn-info btn-block" style="margin-top: 4px">PUSAT BERTAULIAH</a>
                </div>
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/dashboard/user-min.jpg">
                    <a href="{{ url('') }}/company-report/sldn" class="btn btn-info btn-block" style="margin-top: 4px">SLDN</a>
                </div>
            </div>
            {{--<div class="row">--}}
            {{--<div><hr></div>--}}
            {{--</div>--}}



            {{--<div class="row">--}}
            {{--<h3>Senarai Negeri-Negeri : </h3>--}}

            {{--<div class="col-md-6">--}}
            {{--@foreach ($states as $state)--}}
            {{--@if (($loop->index %2) == 0)--}}
            {{--<a href="/company-download/statelist/{{ $state->id }}" class="btn btn-info btn-block" style="margin-top: 4px">{{ $state->name }}</a>--}}
            {{--@endif--}}
            {{--@endforeach--}}
            {{--</div>--}}
            {{--<div class="col-md-6">--}}
            {{--@foreach ($states as $state)--}}
            {{--@if (($loop->index %2) == 1)--}}
            {{--<a href="/company-download/statelist/{{ $state->id }}" class="btn btn-info btn-block" style="margin-top: 4px">{{ $state->name }}</a>--}}
            {{--@endif--}}
            {{--@endforeach--}}
            {{--</div>--}}

            {{--</div>--}}




        </div>
    </div>
    </div>

    {{--<div class="panel panel-default">--}}
    {{--<div class="panel-body">--}}
    {{-- receiver --}}
    {{--<div class="form-group">--}}
    {{--<label class="col-md-4 control-label">Jumlah data yang akan dimuat turun ialah :  {{ $certificates }}</label>--}}
    {{--<div class="col-md-6 col-md-offset-4">--}}
    {{--<a href="/company/download" class="btn btn-primary btn-block">Download Data</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
@endsection

@section('footer_script')
@endsection
