@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Muat Turun Laporan
@endsection

@section('topButton')

@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            {{--@if (Auth::user()->access_power >= 1000)--}}
            <div>
                <h3>Lampiran F :</h3>
            </div>

            <div class="row">
                 @if ((Auth::user()->user_type == 'ppt') ||(Auth::user()->access_power >= '8000'))
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/report/pdf.png">
                    <a href="{{ url('') }}/report/f1" class="btn btn-info btn-block" style="margin-top: 4px">PPT</a>
                </div>
                @endif
                @if ((Auth::user()->user_type == 'ndt') ||(Auth::user()->access_power >= '8000'))
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/report/pdf.png">
                    <a href="{{ url('') }}/report/F2" class="btn btn-danger btn-block" style="margin-top: 4px">NDT</a>
                </div>
                @endif
                @if ((Auth::user()->user_type == 'pb') ||(Auth::user()->access_power >= '8000'))
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/report/pdf.png">
                    <a href="{{ url('') }}/report/F3" class="btn btn-success btn-block" style="margin-top: 4px">PB</a>
                </div>
                @endif
                @if ((Auth::user()->user_type == 'sldn') ||(Auth::user()->access_power >= '8000'))
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/report/pdf.png">
                    <a href="{{ url('') }}/report/F4" class="btn btn-warning btn-block" style="margin-top: 4px">SLDN</a>
                </div>
                @endif
            </div>

            <div>
                <h3>Lampiran G :</h3>
            </div>

            <div class="row">
                @if ((Auth::user()->user_type == 'ppt') ||(Auth::user()->access_power >= '8000'))
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/report/pdf.png">
                    <a href="{{ url('') }}/report/G1" class="btn btn-info btn-block" style="margin-top: 4px">PPT</a>
                </div>
                @endif
                @if ((Auth::user()->user_type == 'ndt') ||(Auth::user()->access_power >= '8000'))
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/report/pdf.png">
                    <a href="{{ url('') }}/report/G2" class="btn btn-danger btn-block" style="margin-top: 4px">NDT</a>
                </div>
                @endif
                @if ((Auth::user()->user_type == 'pb') ||(Auth::user()->access_power >= '8000'))
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/report/pdf.png">
                    <a href="{{ url('') }}/report/G3" class="btn btn-success btn-block" style="margin-top: 4px">PB</a>
                </div>
                @endif
                @if ((Auth::user()->user_type == 'sldn') ||(Auth::user()->access_power >= '8000'))
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/report/pdf.png">
                    <a href="{{ url('') }}/report/G4" class="btn btn-warning btn-block" style="margin-top: 4px">SLDN</a>
                </div>
                @endif

            </div>




        </div>
    </div>
    </div>
@endsection

@section('footer_script')
@endsection
