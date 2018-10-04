@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Tambah DKM/DLKM Baru
@endsection

@section('topButton')

@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                {{-- code --}}
                <div class="form-group{{ $errors->has('programme_code') ? ' has-error' : '' }}">
                    <label for="programme_code" class="col-md-4 control-label">
                        Kod Program
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input name="programme_code" type="text" class="form-control" value="{{ old('programme_code') }}" required autofocus>
                        @include('partials.error_block', ['item' => 'programme_code'])
                    </div>
                </div>

                {{-- noss--}}
                <div class="form-group{{ $errors->has('old_name') ? ' has-error' : '' }}">
                    <label for="old_name" class="col-md-4 control-label">
                        Nama NOSS
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input name="old_name" type="text" class="form-control" value="{{ old('old_name') }}" required>
                        @include('partials.error_block', ['item' => 'old_name'])
                    </div>
                </div>

                {{-- new--}}
                <div class="form-group{{ $errors->has('new_name') ? ' has-error' : '' }}">
                    <label for="new_name" class="col-md-4 control-label">
                       Nama Baru
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input name="new_name" type="text" class="form-control" value="{{ old('new_name') }}" required>
                        @include('partials.error_block', ['item' => 'new_name'])
                    </div>
                </div>


                {{-- Status --}}
                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">
                        Status
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <select name="status" class="form-control">
                            <option selected>Pilih satu..</option>
                            @foreach ($statuses as $status)
                                <option @if (old('status') == $status->key) selected @endif value="{{ $status->key }}">{{ $status->value }}</option>
                            @endforeach
                        </select>
                        @include('partials.error_block', ['item' => 'status'])
                    </div>
                </div>


                {{-- Submit Button --}}
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Tambah DKM/DLKM
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer_script')
@endsection
