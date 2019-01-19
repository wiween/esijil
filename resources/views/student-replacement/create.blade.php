@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="row justify-content-center">
                        <img src="{{ asset('images/jata.png') }}" alt="Jata Malaysia">
                    </div>
                    <div class="row justify-content-center">
                        <h2 style="text-align: center"><b>SEMAKAN STATUS PENGELUARAN SIJIL</b></h2>
                    </div>
                    <div class="row justify-content-center">
                        <h3>JABATAN PEMBANGUNAN KEMAHIRAN</h3>
                    </div>
                    <div class="row justify-content-center">
                        <h3>KEMENTERIAN SUMBER MANUSIA</h3>
                    </div>
                    <div class="panel panel-default">
        <div class="panel-body has-padding">
            <form class="form-horizontal" role="form" method="POST">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">
                        Nama Pelajar :
                    </label>
                                        {{ $certificate->name }}
                        @include('partials.error_block', ['item' => 'name'])
                  </div>

                <div class="form-group{{ $errors->has('ic_number') ? ' has-error' : '' }}">
                    <label for="ic_number" class="col-md-4 control-label">
                        No ID

                    </label>

                        {{ $certificate->ic_number }}
                        @include('partials.error_block', ['item' => 'ic_number'])

                </div>

                {{-- old certificate --}}
                <div class="form-group{{ $errors->has('old_certificate_number') ? ' has-error' : '' }}">
                    <label for="old_certificate_number" class="col-md-4 control-label">
                        No Sijil Lama

                    </label>

                        {{ $certificate->certificate_number }}
                        @include('partials.error_block', ['item' => 'old_certificate_number'])

                </div>

                {{-- type replacement--}}
                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                    <label for="type" class="col-md-4 control-label">
                        Jenis Penggantian
                        <span class="text-danger"> * </span>
                    </label>

                        <select name="type" class="form-control">
                            <option selected>Sila Pilih..</option>
                            @foreach ($types as $type)
                                <option @if (old('type') == $type->name) selected @endif value="{{ $type->name }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        @include('partials.error_block', ['item' => 'type'])

                </div>

                {{-- reason --}}
                <div class="form-group{{ $errors->has('reason') ? ' has-error' : '' }}">
                    <label for="reason" class="col-md-4 control-label">
                        Sebab Penggantian :
                        <span class="text-danger"> * </span></label>
                    <input name="reason" type="text" class="form-control" value="{{ old('reason') }}" required autofocus>
                        @include('partials.error_block', ['item' => 'reason'])
                </div>

                {{-- date_post--}}
                {{--<div class="form-group{{ $errors->has('date_replacement') ? ' has-error' : '' }}">--}}
                    {{--<label for="date_posdate_replacement" class="col-md-4 control-label">--}}
                        {{--Tarikh Permohonan Ganti :--}}
                        {{--<span class="text-danger"> * </span>--}}
                    {{--</label>--}}
                        {{--<input name="date_replacement" type="date" class="form-control" value="{{ old('date_replacement') }}" required>--}}
                        {{--@include('partials.error_block', ['item' => 'date_post'])--}}
                {{--</div>--}}


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
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

