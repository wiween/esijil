@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Tukar Password
@endsection

@section('topButton')

    {{--<a href="{{ url('') }}/user/create" class="btn btn-link btn-float has-text">--}}
        {{--<i class="icon-plus-circle2 text-primary"></i>--}}
        {{--<span>New User</span>--}}
    {{--</a>--}}

@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST">
                {{ csrf_field() }}

                {{-- Old Password --}}
                <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                    <label for="old_password" class="col-md-4 control-label">
                        Old Password
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input value="{{ old('old_password') }}" type="password" class="form-control" name="old_password" required>
                        @include('partials.error_block', ['item' => 'old_password'])
                    </div>
                </div>

                {{-- Password --}}
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">
                        Password
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input value="{{ old('password') }}" type="password" class="form-control" name="password" required>
                        @include('partials.error_block', ['item' => 'password'])
                    </div>
                </div>

                {{-- Confirmed Password --}}
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password_confirmation" class="col-md-4 control-label">
                        Confirm Password
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input value="{{ old('password_confirmation') }}" type="password" class="form-control" name="password_confirmation" required>
                        @include('partials.error_block', ['item' => 'password_confirmation'])
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Tukar Password
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection

@section('footer_script')
@endsection