@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Update :: {{ $user->name }}
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
                        <input name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus>
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
                        <input name="ic_number" type="text" class="form-control" value="{{ old('ic_number', $user->ic_number) }}" required>
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
                        <input name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        @include('partials.error_block', ['item' => 'email'])
                    </div>
                </div>

                {{-- Phone --}}
                <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Phone Number</label>
                    <div class="col-md-6">
                        <input type="text" value="{{ old('phone_number', $user->phone_number) }}" class="form-control" name="phone_number">
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
                        <input type="file" class="form-control" name="avatar" value="{{ old('avatar', $user->avatar) }}">
                        @include('partials.error_block', ['item' => 'avatar'])
                    </div>
                </div>

                @if (Auth::user()->role == 'super_admin' || Auth::user()->role == 'admin' )
                {{-- Status --}}
                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">
                        Status
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <select name="status" class="form-control">
                            <option selected>Pilih Satu..</option>
                            @foreach ($statuses as $status)
                                <option @if (old('status', $user->status) == $status->key) selected @endif value="{{ $status->key }}">
                                    {{ $status->value }}
                                </option>
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
{{--                        {{ $user->role }}--}}
                        <select name="role" class="form-control">
                            <option>Choose One...</option>
                            {{--<option value="admin" @if($user->role == 'admin') selected  @endif>Admin</option>--}}
                            {{--<option value="super_admin" @if($user->role == 'super_admin') selected  @endif>Super Admin</option>--}}
                            {{--<option value="admin.ministry" @if($user->role == 'admin.ministry') selected  @endif>Admin Ministry</option>--}}
                            {{--<option value="user" @if($user->role == 'user') selected  @endif>User</option>--}}

                            @foreach ($roles as $role)
                                <option @if (old('role', $user->role) == $role->name) selected @endif value="{{ $role->name }}">
                                    {{ $role->nick }}
                                </option>
                            @endforeach
                        </select>
                        @include('partials.error_block', ['item' => 'role'])
                    </div>
                </div>


                    {{-- user type --}}
                    <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">
                            Jenis Pengguna
                            <span class="text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            {{--                        {{ $user->role }}--}}
                            <select name="jenispersijilan" class="form-control">
                                <option>Pilih Satu...</option>
                                {{--<option value="admin" @if($user->role == 'admin') selected  @endif>Admin</option>--}}
                                {{--<option value="super_admin" @if($user->role == 'super_admin') selected  @endif>Super Admin</option>--}}
                                {{--<option value="admin.ministry" @if($user->role == 'admin.ministry') selected  @endif>Admin Ministry</option>--}}
                                {{--<option value="user" @if($user->role == 'user') selected  @endif>User</option>--}}

                                @foreach ($jenispersijilans as $jenispersijilan)
                                    <option @if (old('jenispersijilan', $user->user_type) == $jenispersijilan->name) selected @endif value="{{ $jenispersijilan->name }}">
                                        {{ $jenispersijilan->name }}
                                    </option>
                                @endforeach
                            </select>
                            @include('partials.error_block', ['item' => 'jenispersijilan'])
                        </div>
                    </div>

                {{-- Remark --}}
                <div class="form-group{{ $errors->has('remark') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Remark</label>
                    <div class="col-md-6">
                        <textarea name="remark" class="form-control" rows="3">{{ old('remark', $user->remark) }}</textarea>
                    </div>
                    @include('partials.error_block', ['item' => 'remark'])
                </div>
                @endif
                {{-- Submit Button --}}
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Update User
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer_script')
@endsection
