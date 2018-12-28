@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
   Penyerahan Tugas Semula - Aktivi Penggantian
@endsection

@section('topButton')

@endsection

@section('content')
    <div class="panel panel-default" id="app">
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST">
                {{ csrf_field() }}
              <div class="form-group{{ $errors->has('batch') ? ' has-error' : '' }}">
                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                      <label for="name" class="col-md-4 control-label">
                          Nama Pelajar

                      </label>
                      <div class="col-md-6">
                          {{ $replacement->certificate->name }}
                          @include('partials.error_block', ['item' => 'name'])
                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('ic_number') ? ' has-error' : '' }}">
                      <label for="ic_number" class="col-md-4 control-label">
                          No KP

                      </label>
                      <div class="col-md-6">
                          {{ $replacement->certificate->ic_number }}
                          @include('partials.error_block', ['item' => 'ic_number'])
                      </div>
                  </div>

                  {{-- old certificate --}}
                  <div class="form-group{{ $errors->has('old_certificate_number') ? ' has-error' : '' }}">
                      <label for="old_certificate_number" class="col-md-4 control-label">
                          No Sijil Lama

                      </label>
                      <div class="col-md-6">
                          {{ $replacement->certificate->certificate_number }}
                          @include('partials.error_block', ['item' => 'old_certificate_number'])
                      </div>
                  </div>

                </div>

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
