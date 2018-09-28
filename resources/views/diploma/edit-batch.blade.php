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
                       Batch No
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                      B0109
                        @include('partials.error_block', ['item' => 'name'])
                    </div>
                </div>

                {{-- Name --}}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">
                        Kod Program
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        C-051-4
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
                        PEMBANTU JURUTERA ELEKTRIK
                        @include('partials.error_block', ['item' => 'ic_number'])
                    </div>
                </div>

                {{-- Status --}}
                <div class="form-group{{ $errors->has('diploma') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">
                        Nama Baru
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <select name="status" class="form-control">
                            <option selected>Select one..</option>
                            @foreach ($diplomas as $diploma)
                                <option @if (old('diploma') == $diploma->new_name) selected @endif value="{{ $diploma->new_name }}">{{ $diploma->new_name }}</option>
                            @endforeach
                        </select>
                        @include('partials.error_block', ['item' => 'status'])
                    </div>
                </div>
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
