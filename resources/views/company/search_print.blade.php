@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Carian : Kemaskini Maklumat Percetakan
@endsection

@section('topButton')

@endsection

@section('content')
    <div class="panel panel-default" id="app">
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST">
                {{ csrf_field() }}

                {{-- Maklumat Dihantar --}}
                <div class="form-group{{ $errors->has('source') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Carian Melalui</label>
                    <div class="col-md-6">
                        <select name="source" class="form-control" v-model="carian">
                            <option value="">Sila Pilih..</option>
                            <option value="noid">No KP</option>
                            <option value="batch">Batch ID</option>
                        </select>
                        @include('partials.error_block', ['item' => 'source'])
                    </div>
                </div>

                {{-- ID --}}
                <div v-if="carian =='noid'" class="form-group{{ $errors->has('ic_number') ? ' has-error' : '' }}">
                    <label for="ic_number" class="col-md-4 control-label">
                        No KP:
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input name="ic_number" type="text" class="form-control" value="{{ old('ic_number') }}" required autofocus>
                        @include('partials.error_block', ['item' => 'ic_number'])
                    </div>
                </div>

                {{-- Batch--}}
                <div v-if="carian =='batch'" class="form-group{{ $errors->has('batch') ? ' has-error' : '' }}">
                    <label for="batch" class="col-md-4 control-label">
                        Batch ID :
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input name="batch" type="text" class="form-control" value="{{ old('batch') }}" required autofocus>
                        @include('partials.error_block', ['item' => 'batch'])
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Cari Pelajar
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
                carian: '',
                message: 'Hello Vue!',
                remark_PA12: ''
            }
        })
    </script>
@endsection

@section('footer_script')
@endsection
