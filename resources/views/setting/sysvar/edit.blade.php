@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Update :: {{ $var->code }}
@endsection

@section('topButton')

@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST">
                {{ csrf_field() }}

                {{-- Name --}}
                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">
                        <b>Keterangan</b>
                    </label>
                    <div class="col-md-6">
                        {{ $var->desc }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">
                        <b>Jenis Data</b>
                    </label>
                    <div class="col-md-6">
                        {{ $var->datatype }}
                    </div>
                </div>
                <div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">
                        Nilai
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input name="value" type="text" class="form-control" value="{{ old('value', $var->value) }}" required autofocus>
                        @include('partials.error_block', ['item' => 'name'])
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer_script')
@endsection
