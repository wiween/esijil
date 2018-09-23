@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Pengesahan Pembayaran Oleh Syarikat : {{ Request::segment(3) }}
@endsection

@section('topButton')

@endsection

@section('content')
    <div class="panel panel-default" id="app">
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('ic_number') ? ' has-error' : '' }}">
                    <label for="ic_number" class="col-md-4 control-label">
                        No Batch
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <a href="{{ url('') }}/finance/report/{{ $certificate->batch_id }}/{{ $certificate->type }}">{{ $certificate->batch_id }}</a>
                        @include('partials.error_block', ['item' => 'ic_number'])
                    </div>
                </div>

                {{-- diterima?--}}
                <div class="form-group{{ $errors->has('received') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">
                        Disahkan Untuk Bayaran ?
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input name="received" type="radio" value="Y" @if(old('received')) checked @endif  v-model="mypost">Ya
                        <input name="received" type="radio" value="N" @if(old('received')) checked @endif  v-model="mypost">Tidak
                        @include('partials.error_block', ['item' => 'received'])
                    </div>
                </div>

                {{-- receiver --}}
                <div v-if="mypost == 'N'" class="form-group{{ $errors->has('receiver') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Sebab Penolakan</label>
                    <div class="col-md-6">
                        <input type="text" value="{{ old('receiver') }}" class="form-control" name="receiver">
                        @include('partials.error_block', ['item' => 'receiver'])
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Simpan Maklumat
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
                mypost: ''

            }
        })
    </script>
@endsection

@section('footer_script')
@endsection
