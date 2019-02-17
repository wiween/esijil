@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Kemaskini Maklumat Penggantian Sijil : {{ $certificate->ic_number }}
@endsection

@section('topButton')

@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/replacement/'. $certificate->id) }}" >
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">
                        Nama Pelajar

                    </label>
                    <div class="col-md-6">
                        <input type="text" name="name" value="{{ $certificate->name }}" class="form-control">
                        @include('partials.error_block', ['item' => 'name'])
                    </div>
                </div>

                <div class="form-group{{ $errors->has('ic_number') ? ' has-error' : '' }}">
                    <label for="ic_number" class="col-md-4 control-label">
                        No KP

                    </label>
                    <div class="col-md-6">
                        <input type="text" name="ic_number" value="{{ $certificate->ic_number }}" class="form-control">
                        @include('partials.error_block', ['item' => 'ic_number'])
                    </div>
                </div>

                <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                    <label for="level" class="col-md-4 control-label">
                        Tahap

                    </label>
                    <div class="col-md-6">
                        <input type="text" name="level" value="{{ $certificate->level }}" class="form-control">
                        @include('partials.error_block', ['item' => 'level'])
                    </div>
                </div>

                <div class="form-group{{ $errors->has('programme_code') ? ' has-error' : '' }}">
                    <label for="programme_code" class="col-md-4 control-label">
                        Kod Program

                    </label>
                    <div class="col-md-6">
                        <input type="text" name="programme_code" value="{{ $certificate->programme_code }}" class="form-control">
                        @include('partials.error_block', ['item' => 'programme_code'])
                    </div>
                </div>

                <div class="form-group{{ $errors->has('programme_name') ? ' has-error' : '' }}">
                    <label for="programme_name" class="col-md-4 control-label">
                        Kod Program

                    </label>
                    <div class="col-md-6">
                        <input type="text" name="programme_name" value="{{ $certificate->programme_name }}" class="form-control">
                        @include('partials.error_block', ['item' => 'programme_name'])
                    </div>
                </div>

                <div class="form-group{{ $errors->has('nama_syarikat') ? ' has-error' : '' }}">
                    <label for="nama_syarikat" class="col-md-4 control-label">
                        Nama Syarikat

                    </label>
                    <div class="col-md-6">
                        <input type="text" name="nama_syarikat" value="{{ $certificate->nama_syarikat }}" class="form-control">
                        @include('partials.error_block', ['item' => 'nama_syarikat'])
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Kemaskini Maklumat
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer_script')
@endsection
