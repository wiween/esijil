@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
   Maklumat Batch & Penyerahan Tugas
@endsection

@section('topButton')

@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('batch_number') ? ' has-error' : '' }}">
                    <label for="batch_number" class="col-md-4 control-label">
                       No Batch
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        {{ $batch->batch_number }}
                        @include('partials.error_block', ['item' => 'batch_number'])
                    </div>
                </div>

                <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                    <label for="state" class="col-md-4 control-label">
                       Negeri
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        {{ $batch->state_id }}
                        @include('partials.error_block', ['item' => 'state'])
                    </div>
                </div>

                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                    <label for="type" class="col-md-4 control-label">
                       Jenis Sijil
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        {{ $batch->type }}
                        @include('partials.error_block', ['item' => 'type'])
                    </div>
                </div>

                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                    <label for="type" class="col-md-4 control-label">
                        Bilangan Pelajar
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <a href="{{ url('') }}/certificate/list/{{ $batch->batch_number }}">[ {{ $certificates }} ]</a>
                        @include('partials.error_block', ['item' => 'type'])
                    </div>
                </div>

                {{-- Maklumat Dihantar --}}
                <div class="form-group{{ $errors->has('source') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Cetakan Oleh</label>
                    <div class="col-md-6">
                        <select name="source" class="form-control">
                            <option selected>Pilih Sumber..</option>
                            @foreach ($sources as $source)
                                <option @if (old('source', $batch->source) == $source->name) selected @endif value="{{ $source->name }}">
                                    {{ $source->name }}
                                </option>
                            @endforeach
                        </select>
                        @include('partials.error_block', ['item' => 'source'])
                    </div>
                </div>

                {{-- Pegawai--}}
                <div class="form-group{{ $errors->has('officer') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">
                        Pegawai Bertanggungjawab
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <select name="officer" class="form-control">
                            <option selected>Select one..</option>
                            @foreach ($users as $user)
                                <option @if (old('officer', $batch->officer) == $user->name) selected @endif value="{{ $user->name }}">
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>

                        @include('partials.error_block', ['item' => 'officer'])
                    </div>
                </div>
                {{-- Submit Button --}}
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Hantar Maklumat
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer_script')
@endsection
