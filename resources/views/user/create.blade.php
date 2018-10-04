@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Create New User
@endsection

@section('topButton')

@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                {{-- Name --}}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">
                        Name
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input name="name" type="text" class="form-control" value="{{ old('name') }}" required autofocus>
                        @include('partials.error_block', ['item' => 'name'])
                    </div>
                </div>

                {{-- IC Number --}}
                <div class="form-group{{ $errors->has('ic_number') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">
                        IC Number
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input name="ic_number" type="text" class="form-control" value="{{ old('ic_number') }}" required>
                        @include('partials.error_block', ['item' => 'ic_number'])
                    </div>
                </div>

                {{-- Email --}}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">
                        E-Mail Address
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input name="email" type="email" class="form-control" value="{{ old('email') }}" required>
                        @include('partials.error_block', ['item' => 'email'])
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
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password-confirm" class="col-md-4 control-label">
                        Confirm Password
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input value="{{ old('password_confirmation') }}" type="password" class="form-control" name="password_confirmation" required>
                        @include('partials.error_block', ['item' => 'password_confirmation'])
                    </div>
                </div>

                {{-- Phone --}}
                <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Phone Number</label>
                    <div class="col-md-6">
                        <input type="text" value="{{ old('phone_number') }}" class="form-control" name="phone_number">
                        @include('partials.error_block', ['item' => 'phone_number'])
                    </div>
                </div>

                {{-- Avatar / Photo --}}
                <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">
                        Avatar
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input type="file" class="form-control" name="avatar" required>
                        @include('partials.error_block', ['item' => 'avatar'])
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
                            <option selected>Select one..</option>
                            @foreach ($statuses as $status)
                                <option @if (old('status') == $status->key) selected @endif value="{{ $status->key }}">{{ $status->value }}</option>
                            @endforeach
                        </select>
                        @include('partials.error_block', ['item' => 'status'])
                    </div>
                </div>

                {{-- Role --}}
                <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">
                        Role
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <select name="role" class="form-control">
                            <option selected>Select one..</option>
                            @foreach ($roles as $role)
                                <option @if (old('role') == $role->name) selected @endif value="{{ $role->name }}">{{ $role->nick }}</option>
                            @endforeach
                        </select>
                        @include('partials.error_block', ['item' => 'role'])
                    </div>
                </div>

                {{-- user type --}}
                <div class="form-group{{ $errors->has('jenispersijilan') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">
                        Jenis Pengguna
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <select name="jenispersijilan" class="form-control">
                            <option selected>Select one..</option>
                            @foreach ($jenispersijilans as $jenispersijilan)
                                <option @if (old('jenispersijilan') == $jenispersijilan->name) selected @endif value="{{ $jenispersijilan->name }}">{{ $jenispersijilan->name }}</option>
                            @endforeach
                        </select>
                        @include('partials.error_block', ['item' => 'jenispersijilan'])
                    </div>
                </div>


                {{-- Remark --}}
                <div class="form-group{{ $errors->has('remark') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Remark</label>
                    <div class="col-md-6">
                        <textarea name="remark" class="form-control" rows="3"></textarea>
                    </div>
                    @include('partials.error_block', ['item' => 'remark'])
                </div>

                {{-- Submit Button --}}
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Create New User
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer_script')
@endsection
