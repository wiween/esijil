@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Upload Maklumat Pembungkusan
@endsection

@section('topButton')

@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
           {{-- tracking number --}}
            <div class="form-group{{ $errors->has('tracking_number') ? ' has-error' : '' }}">
                <label for="tracking_number" class="col-md-4 control-label">
                    Upload Data
                    <span class="text-danger"> * </span>
                </label>
                <div class="col-md-6">
                    <input name="tracking_number" type="text" class="form-control" value="{{ old('tracking_number') }}" required autofocus>
                    @include('partials.error_block', ['item' => 'tracking_number'])
                </div>
            </div>
            {{-- Bulan--}}
            <div class="form-group{{ $errors->has('tracking_number') ? ' has-error' : '' }}">
                <label for="tracking_number" class="col-md-4 control-label">
                    Upload Data
                    <span class="text-danger"> * </span>
                </label>
                <div class="col-md-6">
                    <input name="tracking_number" type="text" class="form-control" value="{{ old('tracking_number') }}" required autofocus>
                    @include('partials.error_block', ['item' => 'tracking_number'])
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
@endsection
