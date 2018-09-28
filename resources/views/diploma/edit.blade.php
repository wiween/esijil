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
            <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                {{-- Name --}}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">
                        Kod Program
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input name="name" type="text" class="form-control" value="{{ old('name', $diploma->name) }}" required autofocus>
                        @include('partials.error_block', ['item' => 'name'])
                    </div>
                </div>

                {{-- IC Number --}}
                <div class="form-group{{ $errors->has('ic_number') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">
                        Nama NOSS
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input name="ic_number" type="text" class="form-control" value="{{ old('ic_number', $diploma->ic_number) }}" required>
                        @include('partials.error_block', ['item' => 'ic_number'])
                    </div>
                </div>

                {{-- Email --}}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">
                      Nama Baru
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input name="email" type="email" class="form-control" value="{{ old('email', $diploma->email) }}" required>
                        @include('partials.error_block', ['item' => 'email'])
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
                                    <option @if (old('status', $diploma->status) == $status->key) selected @endif value="{{ $status->key }}">
                                        {{ $status->value }}
                                    </option>
                                @endforeach
                            </select>

                            @include('partials.error_block', ['item' => 'status'])
                        </div>
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
