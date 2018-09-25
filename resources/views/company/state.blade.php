@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
   Muat Turun Data Pelajar
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
                    <a href="{{ url('') }}/company-download/state/ppt" class="btn btn-info btn-block" style="margin-top: 4px">PPT</a>
                </div>

                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/dashboard/lookups-min.jpg">
                    <a href="{{ url('') }}/company-download/state/ndt" class="btn btn-info btn-block" style="margin-top: 4px">NDT</a>
                </div>
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/dashboard/target-min.jpg">
                    <a href="{{ url('') }}/company-download/state/pb" class="btn btn-info btn-block" style="margin-top: 4px">PUSAT BERTAULIAH</a>
                </div>
                <div class="col-md-3 col-xs-6 thumbnail">
                    <img class="img-responsive img-rounded" src="{{ url('') }}/images/dashboard/user-min.jpg">
                    <a href="{{ url('') }}/company-download/state/sldn" class="btn btn-info btn-block" style="margin-top: 4px">SLDN</a>
                </div>
              </div>
            <div class="row">
                <div><hr></div>
            </div>


            <div class="row">
                <h3>Bilangan Batch Mengikut Negeri :  {{ strtoupper(Request::segment(3)) }}</h3>
                @foreach($certificates as $certificate)
                    <div class="col-md-2 col-xs-6 thumbnail">
                        <img class="img-responsive img-rounded" src="{{ url('') }}/images/dashboard/audit-min.jpg">
                        <a href="{{ url('') }}/company-download/statelist/{{$certificate->state_id}}/{{ Request::segment(3) }}" class="btn btn-success btn-block">{{ $certificate->state->name }}</a>
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
