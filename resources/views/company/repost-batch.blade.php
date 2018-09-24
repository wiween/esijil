@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Kemaskini Maklumat Pengeposan (Syarikat): {{ $post->certificate->ic_number }}
@endsection

@section('topButton')

@endsection

@section('content')
    <div class="panel panel-default" id="app">
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">
                        Batch No
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        {{ $post->certificate->batch_id }}
                        @include('partials.error_block', ['item' => 'name'])
                    </div>
                </div>
                {{-- tracking number --}}
                <div class="form-group{{ $errors->has('tracking_number') ? ' has-error' : '' }}">
                    <label for="tracking_number" class="col-md-4 control-label">
                        No Tracking
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input name="tracking_number" type="text" class="form-control" value="{{ old('tracking_number', $post->tracking_number) }}" required autofocus>
                        @include('partials.error_block', ['item' => 'tracking_number'])
                    </div>
                </div>

                {{-- date_post--}}
                <div class="form-group{{ $errors->has('date_post') ? ' has-error' : '' }}">
                    <label for="date_post" class="col-md-4 control-label">
                        Tarikh Pos
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input name="date_post" type="date" class="form-control" value="{{ old('date_post', $post->date_post) }}" required>
                        @include('partials.error_block', ['item' => 'date_post'])
                    </div>
                </div>
                {{-- company_post--}}
                <div class="form-group{{ $errors->has('post_company') ? ' has-error' : '' }}">
                    <label for="post_company" class="col-md-4 control-label">
                        Syarikat Pos
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input name="post_company" type="text" class="form-control" value="{{ old('post_company', $post->post_company) }}" required>
                        @include('partials.error_block', ['item' => 'post_company'])
                    </div>
                </div>

                {{-- diterima?--}}
                <div class="form-group{{ $errors->has('received') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">
                        Diterima ?
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input name="received" type="radio" value="Y" @if(old('received', $post->flag_received)) checked @endif  v-model="mypost">Ya
                        <input name="received" type="radio" value="N" @if(old('received', $post->flag_received)) checked @endif  v-model="mypost">Tidak
                        @include('partials.error_block', ['item' => 'received'])
                    </div>
                </div>

                {{-- date_receive // kalau ya baru kuar ni--}}
                <div v-if="mypost == 'Y'" class="form-group{{ $errors->has('date_receive') ? ' has-error' : '' }}">
                    <label for="date_receive" class="col-md-4 control-label">
                        Tarikh Terima
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input name="date_receive" type="date" class="form-control" value="{{ old('date_receive', $post->date_receive) }}" required>
                        @include('partials.error_block', ['item' => 'date_receive'])
                    </div>
                </div>

                {{-- receiver --}}
                <div v-if="mypost == 'Y'" class="form-group{{ $errors->has('receiver') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Nama Penerima</label>
                    <div class="col-md-6">
                        <input type="text" value="{{ old('receiver', $post->receiver) }}" class="form-control" name="receiver">
                        @include('partials.error_block', ['item' => 'receiver'])
                    </div>
                </div>

                {{-- Remark --}}
                <div class="form-group{{ $errors->has('remark') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Remark</label>
                    <div class="col-md-6">
                        <textarea name="remark" class="form-control" rows="3"></textarea>
                    </div>
                    @include('partials.error_block', ['item' => 'remark'])
                </div>

                {{-- Submit Button --}}
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Kemaskini Maklumat
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