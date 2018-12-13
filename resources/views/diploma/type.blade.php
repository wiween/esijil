@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    DKM/DLKM
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
                    <a href="{{ url('') }}/diploma/batch/ppt" class="btn btn-info btn-block" style="margin-top: 4px">PPT</a>
                </div>

                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/dashboard/lookups-min.jpg">
                    <a href="{{ url('') }}/diploma/batch/ndt" class="btn btn-info btn-block" style="margin-top: 4px">NDT</a>
                </div>
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/dashboard/target-min.jpg">
                    <a href="{{ url('') }}/diploma/batch/pb" class="btn btn-info btn-block" style="margin-top: 4px">PUSAT BERTAULIAH</a>
                </div>
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/dashboard/user-min.jpg">
                    <a href="{{ url('') }}/diploma/batch/sldn" class="btn btn-info btn-block" style="margin-top: 4px">SLDN</a>
                </div>
            </div>
            
        </div>
    </div>
    </div>

@endsection

@section('footer_script')
@endsection
