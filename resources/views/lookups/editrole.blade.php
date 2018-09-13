@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Edit {{ $role->name }}
@endsection

@section('topButton')

@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

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
                                <option @if (old('status', $role->status) == $status->key) selected @endif value="{{ $status->key }}">
                                    {{ $status->value }}
                                </option>
                            @endforeach
                        </select>

                        @include('partials.error_block', ['item' => 'status'])
                    </div>
                </div>



                {{-- Submit Button --}}
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Update role
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer_script')
@endsection
