@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Kemaskini Maklumat Jawatan Kuasa Pengesahan: {{ $espkm->name }}
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

                {{-- ic number --}}
                <div class="form-group{{ $errors->has('ic_number') ? ' has-error' : '' }}">
                    <label for="ic_number" class="col-md-4 control-label">
                        No KP
                    </label>
                    <div class="col-md-6">
                        {{ $espkm->ic_number }}
                    </div>
                </div>

                {{-- name --}}
                <div class="form-group{{ $errors->has('ic_number') ? ' has-error' : '' }}">
                    <label for="ic_number" class="col-md-4 control-label">
                        Nama
                    </label>
                    <div class="col-md-6">
                        {{ $espkm->name }}
                    </div>
                </div>

                {{-- ic number --}}
                <div class="form-group{{ $errors->has('ic_number') ? ' has-error' : '' }}">
                    <label for="ic_number" class="col-md-4 control-label">
                        No Batch
                    </label>
                    <div class="col-md-6">
                        {{ $espkm->training_group_number }}
                    </div>
                </div>

                {{-- ic number --}}
                <div class="form-group{{ $errors->has('ic_number') ? ' has-error' : '' }}">
                    <label for="ic_number" class="col-md-4 control-label">
                        Kod Program
                    </label>
                    <div class="col-md-6">
                        {{ $espkm->programme_code }}
                    </div>
                </div>

                {{-- ic number --}}
                <div class="form-group{{ $errors->has('ic_number') ? ' has-error' : '' }}">
                    <label for="ic_number" class="col-md-4 control-label">
                        Nama Program
                    </label>
                    <div class="col-md-6">
                        {{ $espkm->programme_name }}
                    </div>
                </div>


                {{--Pengesahan Board--}}
                <div class="form-group{{ $errors->has('board_confirm') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">
                        Pengesahan Jawatankuasa ?
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input name="board_confirm" type="radio" value="Y" @if(old('board_confirm')) checked @endif v-model="myboard"> Disahkan
                        <input name="board_confirm" type="radio" value="R" @if(old('board_confirm')) checked @endif v-model="myboard"> Ditolak
                        <input name="board_confirm" type="radio" value="K" @if(old('board_confirm')) checked @endif v-model="myboard"> KIV
                        @include('partials.error_block', ['item' => 'board_confirm'])
                    </div>
                </div>
                {{--sebab ditolak atau KIV--}}
                <div v-if="(myboard == 'R' || myboard == 'K')" class="form-group{{ $errors->has('reason') ? ' has-error' : '' }}">
                    <label for="reason" class="col-md-4 control-label">
                        Sebab
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input name="reason" type="text" class="form-control" value="{{ old('reason') }}">
                        @include('partials.error_block', ['item' => 'reason'])
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
                myboard: ''

            }
        })
    </script>

@endsection

@section('footer_script')
@endsection