@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Maklumat Batch & Penyerahan Tugas Mengikut Negeri
@endsection

@section('topButton')

@endsection

@section('content')
    <div class="panel panel-default" id="app">
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                    <label for="state" class="col-md-3 control-label">
                        Negeri
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-7">
                        {{ Request::segment(3) }} : {{ $state->name }}
                        @include('partials.error_block', ['item' => 'state'])
                    </div>
                </div>

                <div class="form-group{{ $errors->has('batch') ? ' has-error' : '' }}">
                    <label for="batch" class="col-md-3 control-label">
                        Senarai Batch No
                        <span class="text-danger"> * </span>
                    </label>

                    <div class="col-md-7 form-group">
                        @foreach($batches as $batch)
                        <input name="batch[]" type="checkbox" value="{{ old('batch',$batch->batch_id) }}">
                        <a href="{{ url('') }}/certificate/list/{{ $batch->batch_id }}/{{ $batch->type }}">[ {{  $batch->batch_id }} ]</a>  :  {{ $batch->pb_name }}
                        <br>
                        @include('partials.error_block', ['item' => 'batch'])
                        @endforeach
                    </div>

                </div>

                 {{--Race--}}
                {{--<div class="form-group row {{ $errors->has('race') ? ' has-error' : '' }}">--}}
                    {{--<div class="col-md-1 col-form-label" align="right">2.</div>--}}
                    {{--<div class="col-md-5 col-form-label">--}}
                        {{--Bangsa--}}
                        {{--<span class="text-danger"> * </span>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-5">--}}
                        {{--<select name="PA12" class="form-control" required v-model="remark_PA12">--}}
                            {{--<option value="">Sila Pilih..</option>--}}
                            {{--@foreach ($sources as $source)--}}
                                {{--<option @if (old('PA12') == $source->name)--}}
                                        {{--selected @endif value="{{ $source->name }}">{{ $source->name }}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                        {{--@include('partials.error_block', ['item' => 'source'])--}}
                    {{--</div>--}}
                    {{--@include('partials.error_block', ['item' => 'source'])--}}
                {{--</div>--}}

                {{--remark_PA12 Race Others--}}
                {{--<div v-if="remark_PA12 =='dalaman'" class="form-group row {{ $errors->has('remark_PA12') ? ' has-error' : '' }}">--}}
                    {{--<div class="col-md-1 col-form-label" align="right"></div>--}}
                    {{--<div class="col-md-5 col-form-label">--}}
                        {{--Sila nyatakan--}}
                        {{--<span class="text-danger"> * </span>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-5">--}}
                        {{--<input type="text" value="" class="form-control" name="remark_PA12">--}}
                        {{--@include('partials.error_block', ['item' => 'remark_PA12'])--}}
                        {{--<input type="hidden" value="Lain-lain" class="form-control" name="remark_2_PA12">--}}
                    {{--</div>--}}
                    {{--@include('partials.error_block', ['item' => 'remark_PA12'])--}}
                {{--</div>--}}

                {{-- Maklumat Dihantar --}}
                <div class="form-group{{ $errors->has('source') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Cetakan Oleh
                    <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-7">
                        <select name="source" class="form-control" v-model="officer" required>
                            <option selected>Pilih Sumber..</option>
                            @foreach ($sources as $source)
                                <option @if (old('source') == $source->name) selected @endif value="{{ $source->name }}">
                                    {{ $source->name }}
                                </option>
                            @endforeach
                        </select>
                        @include('partials.error_block', ['item' => 'source'])
                    </div>
                </div>

                 {{--Pegawai--}}

                <div v-if="officer =='dalaman'" class="form-group{{ $errors->has('officer') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">
                        Pegawai Bertanggungjawab
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-7">
                        <select name="officer" class="form-control">
                            <option selected>Select one..</option>
                            @foreach ($users as $user)
                                <option @if (old('officer') == $user->email) selected @endif value="{{ $user->email }}">
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>

                        @include('partials.error_block', ['item' => 'officer'])
                    </div>
                </div>
                {{--sesi--}}

                <div v-if="officer =='syarikat'" class="form-group{{ $errors->has('session') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">
                        Ref
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-7">
                        <input name="session" type="text" class="form-control" value="{{ old('session') }}" required>
                        @include('partials.error_block', ['item' => 'session'])
                    </div>
                </div>
                {{--<div>--}}
                    {{--@{{ message }}--}}
                {{--</div>--}}

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
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                officer: '',
                message: 'Hello Vue!',
                remark_PA12: ''
            }
        })
    </script>
@endsection


@section('footer_script')
@endsection
