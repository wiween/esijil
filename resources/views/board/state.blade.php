@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Pengesahan Oleh Jawatakuasa Penilaian Persijilan
@endsection

@section('topButton')
    @if (Auth::user()->access_power >= 2000)
        <a href="#" class="btn btn-link btn-float has-text">
            <i class="icon-printer2 text-primary"></i>
            <span>Cetak Sijil</span>
        </a>
    @endif
    @if (Auth::user()->access_power >= 1000)
        <a href="#" class="btn btn-link btn-float has-text">
            <i class="icon-coin-dollar text-primary"></i>
            <span>Bayaran</span>
        </a>
    @endif
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            {{--@if (Auth::user()->access_power >= 1000)--}}
            <div class="row">
                <h3>Jenis Pengajian : </h3>
                {{--<div class="col-md-3 col-xs-6 thumbnail">--}}
                    {{--<img class="img-responsive img-rounded" src="{{ url('') }}/images/dashboard/audit-min.jpg">--}}
                    {{--<a href="/board/state/ppt" class="btn btn-info btn-block" style="margin-top: 4px">PPT</a>--}}
                {{--</div>--}}

                {{--<div class="col-md-3 col-xs-6 thumbnail">--}}
                    {{--<img class="img-responsive img-rounded" src="{{ url('') }}/images/dashboard/lookups-min.jpg">--}}
                    {{--<a href="/board/state/ndt" class="btn btn-info btn-block" style="margin-top: 4px">NDT</a>--}}
                {{--</div>--}}
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/dashboard/target-min.jpg">
                    <a href="{{ url('') }}/board/state/pt" class="btn btn-info btn-block" style="margin-top: 4px">PUSAT BERTAULIAH</a>
                </div>
                {{--<div class="col-md-3 col-xs-6 thumbnail">--}}
                    {{--<img class="img-responsive img-rounded" src="{{ url('') }}/images/dashboard/user-min.jpg">--}}
                    {{--<a href="/board/state/sldn" class="btn btn-info btn-block" style="margin-top: 4px">SLDN</a>--}}
                {{--</div>--}}
            </div>
            <div class="row">
                <div><hr></div>
            </div>


            <div class="row">
                <h3>Bilangan Batch Mengikut Negeri :  {{ strtoupper(Request::segment(3)) }}</h3>
                @foreach($espkms as $espkm)
                    <div class="col-md-2 col-xs-6 thumbnail">
                        <img class="img-responsive img-rounded" src="{{ url('') }}/images/dashboard/audit-min.jpg">
                        <a href="{{ url('') }}/board/statelist/{{$espkm->state_id}}" class="btn btn-success btn-block">{{ $espkm->state->name }}</a>
                        {{--@foreach($batches as $batch)--}}
                            {{--<a href="/board/list/{{$batch->id}}">{{ $batch->batch_number }}</a>--}}
                        {{--@endforeach--}}

                    </div>
                @endforeach
            </div>




        </div>
    </div>
@endsection

@section('footer_script')
@endsection
