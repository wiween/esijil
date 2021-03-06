@inject('User', 'App\User')

@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
  Agihan Tugasan
@endsection

@section('topButton')

@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
           <div class="row">
                <h3>Jenis Pentauliahan: </h3>
               @if ((Auth::user()->user_type == $User::USER_TYPE_PPT) ||(Auth::user()->access_power >= '8000'))
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/dashboard/audit-min.jpg">
                    <a href="{{ url('') }}/certificate/state/ppt" class="btn btn-info btn-block" style="margin-top: 4px">PPT</a>
                </div>
               @endif
               @if ((Auth::user()->user_type == $User::USER_TYPE_NDT) ||(Auth::user()->access_power >= '8000'))
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/dashboard/lookups-min.jpg">
                    <a href="{{ url('') }}/certificate/state/ndt" class="btn btn-info btn-block" style="margin-top: 4px">NDT</a>
                </div>
               @endif
               @if ((Auth::user()->user_type == $User::USER_TYPE_PB) ||(Auth::user()->access_power >= '8000'))
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/dashboard/target-min.jpg">
                    <a href="{{ url('') }}/certificate/state/pb" class="btn btn-info btn-block" style="margin-top: 4px">PUSAT BERTAULIAH</a>
                </div>
               @endif
               @if ((Auth::user()->user_type == $User::USER_TYPE_SLDN) ||(Auth::user()->access_power >= '8000'))
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/dashboard/user-min.jpg">
                    <a href="{{ url('') }}/certificate/state/sldn" class="btn btn-info btn-block" style="margin-top: 4px">SLDN</a>
                </div>
               @endif
           </div>
            {{--<div class="row">--}}
                {{--<div><hr></div>--}}
            {{--</div>--}}


            {{--<div class="row">--}}
                {{--<h3>Senarai Negeri-Negeri : </h3>--}}

                {{--<div class="col-md-6">--}}
                    {{--@foreach ($states as $state)--}}
                        {{--@if (($loop->index %2) == 0)--}}
                            {{--<a href="{{ url('') }}/certificate/statelist/{{ $state->id }}" class="btn btn-info btn-block" style="margin-top: 4px">{{ $state->name }}</a>--}}
                        {{--@endif--}}
                    {{--@endforeach--}}
                {{--</div>--}}
                {{--<div class="col-md-6">--}}
                    {{--@foreach ($states as $state)--}}
                        {{--@if (($loop->index %2) == 1)--}}
                            {{--<a href="{{ url('') }}/certificate/statelist/{{ $state->id }}" class="btn btn-info btn-block" style="margin-top: 4px">{{ $state->name }}</a>--}}
                        {{--@endif--}}
                    {{--@endforeach--}}
                {{--</div>--}}

            {{--</div>--}}




        </div>
    </div>
    </div>
@endsection

@section('footer_script')
@endsection
