@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Laporan :
@endsection

@section('topButton')

@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST">
                {{ csrf_field() }}
                {{-- Name --}}
                <div class="form-group{{ $errors->has('batch') ? ' has-error' : '' }}">
                    <label for="batch" class="col-md-4 control-label">
                        No Batch :
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input name="batch" type="text" class="form-control" value="{{ old('batch') }}" required autofocus>
                        @include('partials.error_block', ['item' => 'batch'])
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                           Papar Laporan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer_script')
@endsection
