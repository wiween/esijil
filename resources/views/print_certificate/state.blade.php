@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Cetakan Sijil
@endsection

@section('topButton')
    {{--@if (Auth::user()->access_power >= 2000)--}}
        {{--<a href="#" class="btn btn-link btn-float has-text">--}}
            {{--<i class="icon-printer2 text-primary"></i>--}}
            {{--<span>Cetak Sijil</span>--}}
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

            <div class="row">
                <h3>Jenis Pengajian : </h3>

                @if ((Auth::user()->user_type == 'ppt') ||(Auth::user()->access_power >= '8000'))
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/dashboard/audit-min.jpg">
                    <a href="{{ url('') }}/certificate/state/ppt" class="btn btn-info btn-block" style="margin-top: 4px">PPT</a>
                </div>
                @endif
                @if ((Auth::user()->user_type == 'ndt') ||(Auth::user()->access_power >= '8000'))
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/dashboard/lookups-min.jpg">
                    <a href="{{ url('') }}/certificate/state/ndt" class="btn btn-info btn-block" style="margin-top: 4px">NDT</a>
                </div>
                @endif
                @if ((Auth::user()->user_type == 'pb') ||(Auth::user()->access_power >= '8000'))
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/dashboard/target-min.jpg">
                    <a href="{{ url('') }}/certificate/state/pb" class="btn btn-info btn-block" style="margin-top: 4px">PUSAT BERTAULIAH</a>
                </div>
                @endif
                @if ((Auth::user()->user_type == 'sldn') ||(Auth::user()->access_power >= '8000'))
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/dashboard/user-min.jpg">
                    <a href="{{ url('') }}/certificate/state/sldn" class="btn btn-info btn-block" style="margin-top: 4px">SLDN</a>
                </div>
                @endif
            </div>
            <div class="row">
                <div><hr></div>
            </div>


            <div class="row">
                <h3>Bilangan Batch Mengikut Negeri :  {{ strtoupper(Request::segment(3)) }}</h3>
                @foreach($certificates as $certificate)
                    <div class="col-md-2 col-xs-6 thumbnail">
                        <img class="img-responsive img-rounded" src="{{ url('') }}/images/dashboard/audit-min.jpg">
                        <a href="{{ url('') }}/certificate/statelist/{{$certificate->state_id}}/{{ Request::segment(3) }}" class="btn btn-success btn-block">{{ $certificate->state->name }}</a>
                    {{--@foreach($batches as $batch)--}}
                    {{--<a href="/certificate/batch/{{$batch->id}}">{{ $batch->batch_number }}</a>--}}
                    {{--@endforeach--}}

                </div>
                @endforeach
            </div>




        </div>
    </div>
@endsection

@section('footer_script')
@endsection
