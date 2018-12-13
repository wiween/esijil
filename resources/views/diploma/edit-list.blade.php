@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Kemaskini DKM/DLKM
@endsection

@section('topButton')

@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST">
                {{ csrf_field() }}

                {{-- Name --}}
                <div class="form-group{{ $errors->has('batch_id') ? ' has-error' : '' }}">
                    <label for="batch_id" class="col-md-4 control-label">
                        Batch No
                      </label>
                    <div class="col-md-6">
                        {{ $certificate->batch_id }}
                        @include('partials.error_block', ['item' => 'batch_id'])
                    </div>
                </div>

                {{-- Name --}}
                <div class="form-group{{ $errors->has('ic_number') ? ' has-error' : '' }}">
                    <label for="ic_number" class="col-md-4 control-label">
                        No KP
                    </label>
                    <div class="col-md-6">
                        {{ $certificate->ic_number }}
                        @include('partials.error_block', ['item' => 'ic_number'])
                    </div>
                </div>

                {{-- Name --}}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">
                        Name
                    </label>
                    <div class="col-md-6">
                        {{ $certificate->name }}
                        @include('partials.error_block', ['item' => 'name'])
                    </div>
                </div>

                {{-- Name --}}
                <div class="form-group{{ $errors->has('programme_code') ? ' has-error' : '' }}">
                    <label for="programme_code" class="col-md-4 control-label">
                        Kod Program
                    </label>
                    <div class="col-md-6">
                        {{ $certificate->programme_code }}
                        @include('partials.error_block', ['item' => 'programme_code'])
                    </div>
                </div>

                {{-- IC Number --}}
                <div class="form-group{{ $errors->has('programme_name') ? ' has-error' : '' }}">
                    <label for="programme_name" class="col-md-4 control-label">
                        Nama NOSS
                     </label>
                    <div class="col-md-6">
                        {{ $certificate->programme_name }}
                        @include('partials.error_block', ['item' => 'programme_name'])
                    </div>
                </div>

                {{-- Status --}}
                <div class="form-group{{ $errors->has('diploma') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">
                        Nama Baru
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <select name="diploma" class="form-control">
                            <option selected>Pilih Satu..</option>
                            @foreach ($diplomas as $diploma)
                                <option @if (old('diploma') == $diploma->new_name) selected @endif value="{{ $diploma->new_name }}">{{ $diploma->code_programmed . '/' . $diploma->new_name }}</option>
                            @endforeach
                        </select>
                        @include('partials.error_block', ['item' => 'diploma'])
                    </div>
                </div>
                {{-- Submit Button --}}
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Kemaskini
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer_script')
@endsection
