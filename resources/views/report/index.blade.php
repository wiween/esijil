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
                <h3>Lampiran E :</h3>
            </div>

                <div class="row">

                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/report/pdf.png">
                    <a href="{{ url('') }}/report/E1" class="btn btn-success btn-block" style="margin-top: 4px">E1</a>
                </div>

                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/report/pdf.png">
                    <a href="{{ url('') }}/report/E2" class="btn btn-success btn-block" style="margin-top: 4px">E2</a>
                </div>
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/report/pdf.png">
                    <a href="{{ url('') }}/report/E3" class="btn btn-success btn-block" style="margin-top: 4px">E3</a>
                </div>
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/report/pdf.png">
                    <a href="{{ url('') }}/report/E4" class="btn btn-success btn-block" style="margin-top: 4px">E4</a>
                </div>

            </div>

            <div>
                <h3>Lampiran F :</h3>
            </div>

            <div class="row">

                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/report/pdf.png">
                    <a href="{{ url('') }}/report/f1" class="btn btn-info btn-block" style="margin-top: 4px">F1</a>
                </div>

                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/report/pdf.png">
                    <a href="{{ url('') }}/report/F2" class="btn btn-info btn-block" style="margin-top: 4px">F2</a>
                </div>
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/report/pdf.png">
                    <a href="{{ url('') }}/report/F3" class="btn btn-info btn-block" style="margin-top: 4px">F3</a>
                </div>
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/report/pdf.png">
                    <a href="{{ url('') }}/report/F4" class="btn btn-info btn-block" style="margin-top: 4px">F4</a>
                </div>
            </div>

            <div>
                <h3>Lampiran G :</h3>
            </div>

            <div class="row">

                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/report/pdf.png">
                    <a href="{{ url('') }}/report/G1" class="btn btn-warning btn-block" style="margin-top: 4px">G1</a>
                </div>

                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/report/pdf.png">
                    <a href="{{ url('') }}/report/G2" class="btn btn-warning btn-block" style="margin-top: 4px">G2</a>
                </div>
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/report/pdf.png">
                    <a href="{{ url('') }}/report/G3" class="btn btn-warning btn-block" style="margin-top: 4px">G3</a>
                </div>
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/report/pdf.png">
                    <a href="{{ url('') }}/report/G4" class="btn btn-warning btn-block" style="margin-top: 4px">G4</a>
                </div>
               
            </div>




        </div>
    </div>
    </div>
@endsection

@section('footer_script')
@endsection
