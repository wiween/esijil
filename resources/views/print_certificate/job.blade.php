@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Kemaskini Maklumat : {{ $certificate->name }}
@endsection

@section('topButton')
    {{--<a href="#" class="btn btn-link btn-float has-text">--}}
    {{--<i class="icon-plus-circle2 text-primary"></i>--}}
    {{--<span>New Activity </span>--}}
    {{--</a>--}}
    {{--<a href="#" class="btn btn-link btn-float has-text">--}}
    {{--<i class="fa fa-id-card-o text-sunflower"></i>--}}
    {{--<span>New Course</span>--}}
    {{--</a>--}}
@endsection

@section('content')
    <div class="panel panel-default" id="app">
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                {{-- batch number --}}
                <div class="form-group{{ $errors->has('ic_number') ? ' has-error' : '' }}">
                    <label for="ic_number" class="col-md-4 control-label">
                        No Batch
                    </label>
                    <div class="col-md-6">
                        {{ $certificate->batch_id }}
                    </div>
                </div>

                {{-- ic number --}}
                <div class="form-group{{ $errors->has('ic_number') ? ' has-error' : '' }}">
                    <label for="ic_number" class="col-md-4 control-label">
                        No ID
                    </label>
                    <div class="col-md-6">
                        {{ $certificate->ic_number }}
                    </div>
                </div>

                {{-- name --}}
                <div class="form-group{{ $errors->has('ic_number') ? ' has-error' : '' }}">
                    <label for="ic_number" class="col-md-4 control-label">
                        Nama
                    </label>
                    <div class="col-md-6">
                        {{ $certificate->name }}
                    </div>
                </div>

                {{-- ic number --}}
                <div class="form-group{{ $errors->has('ic_number') ? ' has-error' : '' }}">
                    <label for="ic_number" class="col-md-4 control-label">
                        No Kumpulan Latihan
                    </label>
                    <div class="col-md-6">
                        {{ $certificate->training_group_number }}
                    </div>
                </div>

                {{-- ic number --}}
                <div class="form-group{{ $errors->has('ic_number') ? ' has-error' : '' }}">
                    <label for="ic_number" class="col-md-4 control-label">
                        Kod Program
                    </label>
                    <div class="col-md-6">
                        {{ $certificate->programme_code }}
                    </div>
                </div>

                {{-- ic number --}}
                <div class="form-group{{ $errors->has('ic_number') ? ' has-error' : '' }}">
                    <label for="ic_number" class="col-md-4 control-label">
                        Nama Program
                    </label>
                    <div class="col-md-6">
                        {{ $certificate->programme_name }}
                    </div>
                </div>

                {{-- state --}}
                <div class="form-group{{ $errors->has('ic_number') ? ' has-error' : '' }}">
                    <label for="ic_number" class="col-md-4 control-label">
                       Negeri
                    </label>
                    <div class="col-md-6">
                        {{ $certificate->state->name }}
                    </div>
                </div>

                {{-- state --}}
                <div class="form-group{{ $errors->has('ic_number') ? ' has-error' : '' }}">
                    <label for="ic_number" class="col-md-4 control-label">
                        Sumber
                    </label>
                    <div class="col-md-6">
                        {{ $certificate->source }}
                    </div>
                </div>



                {{-- Maklumat Dihantar --}}
                <div class="form-group{{ $errors->has('source') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Dicetak Oleh</label>
                    <div class="col-md-6">
                        <select name="source" class="form-control" v-model="officer">
                            <option selected>Pilih Sumber..</option>
                            @foreach ($sources as $source)
                                <option @if(old('source', $certificate->source) == $source->name) selected @endif value="{{ $source->name }}">
                                    {{ $source->name }}
                                </option>
                            @endforeach
                        </select>
                        @include('partials.error_block', ['item' => 'source'])
                    </div>
                </div>

                {{-- Pegawai--}}
                <div v-if="officer =='dalaman'" class="form-group{{ $errors->has('officer') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">
                        Pegawai Bertanggungjawab
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <select name="officer" class="form-control">
                            <option selected>Select one..</option>
                            @foreach ($users as $user)
                                <option @if (old('officer',$certificate->officer) == $user->email) selected @endif value="{{ $user->email }}">
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>

                        @include('partials.error_block', ['item' => 'officer'])
                    </div>
                </div>

                {{--sesi--}}

                <div v-if="officer =='syarikat'" class="form-group{{ $errors->has('session') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">
                        Sesi
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input name="session" type="text" class="form-control" value="{{ old('session') }}" required>
                        @include('partials.error_block', ['item' => 'session'])
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Kemaskini Rekod
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <script >
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