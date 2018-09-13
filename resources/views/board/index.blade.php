@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
   Pengesahan Oleh Jawatakuasa Penilaian Persijilan
@endsection

@section('topButton')
    @if (Auth::user()->access_power >= 2000)
        <a href="/board/fetch-data" class="btn btn-link btn-float has-text">
            <i class="icon-user-tie text-primary"></i>
            <span>Tarik Data SKM</span>
        </a>
    @endif
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
                <h3>Jenis Pengajian : </h3>
                {{--<div class="col-md-3 col-xs-6 thumbnail">--}}
                    {{--<img class="img-responsive img-rounded" src="/images/dashboard/audit-min.jpg">--}}
                    {{--<a href="/board/state/ppt" class="btn btn-info btn-block" style="margin-top: 4px">PPT</a>--}}
                {{--</div>--}}

                {{--<div class="col-md-3 col-xs-6 thumbnail">--}}
                    {{--<img class="img-responsive img-rounded" src="/images/dashboard/lookups-min.jpg">--}}
                    {{--<a href="/board/state/ndt" class="btn btn-info btn-block" style="margin-top: 4px">NDT</a>--}}
                {{--</div>--}}
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="/images/dashboard/target-min.jpg">
                    <a href="/board/state/pb" class="btn btn-info btn-block" style="margin-top: 4px">PUSAT BERTAULIAH</a>
                </div>
                {{--<div class="col-md-3 col-xs-6 thumbnail">--}}
                    {{--<img class="img-responsive img-rounded" src="/images/dashboard/user-min.jpg">--}}
                    {{--<a href="/board/state/sldn" class="btn btn-info btn-block" style="margin-top: 4px">SLDN</a>--}}
                {{--</div>--}}
            </div>
            <div class="row">
                <div><hr></div>
            </div>


            <div class="row">
                <h3>Senarai Negeri-Negeri : </h3>

                <div class="col-md-6">
                    @foreach ($states as $state)
                        @if (($loop->index %2) == 0)
                    <a href="/board/statelist/{{ $state->id }}" class="btn btn-info btn-block" style="margin-top: 4px">{{ $state->name }}</a>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-6">
                    @foreach ($states as $state)
                        @if (($loop->index %2) == 1)
                            <a href="/board/statelist/{{ $state->id }}" class="btn btn-info btn-block" style="margin-top: 4px">{{ $state->name }}</a>
                       @endif
                    @endforeach
                </div>

            </div>




        </div>
    </div>
    </div>
@endsection

@section('footer_script')
@endsection
