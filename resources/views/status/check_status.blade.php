@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">

                    <div class="card-header"><img src="{{ url('') }}/images/jatasmall.jpg"> Semak Status</div>

                    <div class="card-body" id="app">
                        <form method="POST" class="form-horizontal" role="form">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Jenis Sijil</label>
                                <div class="col-md-8">
                                    <select name="category" class="form-control">
                                        <option value="">Sila Pilih..</option>
                                        <option value="baru">Sijil Baru</option>
                                        <option value="gantian">Gantian</option>
                                    </select>
                                    @include('partials.error_block', ['item' => 'category'])
                                </div>
                            </div>
                            {{-- Maklumat Dihantar --}}
                            {{--<div class="form-group{{ $errors->has('source') ? ' has-error' : '' }}">--}}
                                {{--<label class="col-md-4 control-label">Carian Melalui</label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<select name="source" class="form-control" v-model="carian">--}}
                                        {{--<option value="">Sila Pilih..</option>--}}
                                        {{--<option value="noid">No KP</option>--}}
                                        {{--<option value="batch">No Batch</option>--}}
                                    {{--</select>--}}
                                    {{--@include('partials.error_block', ['item' => 'source'])--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group"><h5> Sila masukkan salah satu maklumat. Batch No atau No KP atau kedua-duanya sekali</h5></div>
                            {{-- Batch--}}
                            <div class="form-group{{ $errors->has('batch') ? ' has-error' : '' }}">
                                <label for="batch" class="col-md-4 control-label">
                                    Batch No/Angka Giliran :
                                </label>
                                <div class="col-md-8">
                                    <input name="batch" type="text" class="form-control" value="{{ old('batch') }}">
                                     @include('partials.error_block', ['item' => 'batch'])
                                </div>
                            </div>

                            {{-- ID --}}
                            <div class="form-group{{ $errors->has('ic_number') ? ' has-error' : '' }}">
                                <label for="ic_number" class="col-md-4 control-label">
                                    No KP :
                                </label>
                                <div class="col-md-8">
                                    <input name="ic_number" type="text" class="form-control" value="{{ old('ic_number') }}">
                                    @include('partials.error_block', ['item' => 'ic_number'])
                                </div>
                            </div>

                            {{-- Submit Button --}}
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Semak Status
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                carian: '',
                message: 'Hello Vue!',
                remark_PA12: ''
            }
        })
    </script>

@endsection
