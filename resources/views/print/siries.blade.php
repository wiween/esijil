@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Kemaskini Maklumat No Siri Sebelum Cetak : {{ Request::segment(3) }}
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
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                {{-- ic number --}}
                <div class="form-group{{ $errors->has('ic_number') ? ' has-error' : '' }}">
                    <label for="ic_number" class="col-md-4 control-label">
                       No Batch
                    </label>
                    <div class="col-md-6">
                        {{  Request::segment(3) }}
                    </div>
                </div>

                {{-- Pengajian --}}
                <div class="form-group{{ $errors->has('ic_number') ? ' has-error' : '' }}">
                    <label for="ic_number" class="col-md-4 control-label">
                        Jenis Pengajian
                    </label>
                    <div class="col-md-6">
                        {{  ucwords(Request::segment(4)) }}
                    </div>
                </div>

                {{-- Total --}}
                <div class="form-group{{ $errors->has('ic_number') ? ' has-error' : '' }}">
                    <label for="ic_number" class="col-md-4 control-label">
                       Jumlah Sijil Yang Akan Dicetak
                    </label>
                    <div class="col-md-6">
                        {{ $total_certificates }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4">
                        <h6>PANDUAN : No Digit Terahir Bagi Setiap Sijil</h6>
                    </div>
                    <div class="col-md-6">
                        NULL - 000000 <br>
                        A    - 000000 <br>
                        B    - 000000 <br>
                        C    - 000000 <br>
                        D    - 000000 <br>
                        E    - 000000
                    </div>
                </div>

                {{-- Mula No Siri --}}
                <div class="form-group">
                    <label for="siries" class="col-md-4 control-label">
                       Masukkan Permulaan No Siri
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-2 {{ $errors->has('start_siries') ? ' has-error' : '' }}">
                        <select name="start_siries" class="form-control">
                            <option value=""><< Sila Pilih >></option>
                            <option value=" "> </option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                       </select>
                        @include('partials.error_block', ['item' => 'start_siries'])
                    </div>
                    <div class="col-md-4 {{ $errors->has('siries') ? ' has-error' : '' }}">
                        <input name="siries" type="text" class="form-control" value="{{ old('siries') }}" required>
                        @include('partials.error_block', ['item' => 'siries'])
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

@endsection

@section('footer_script')
@endsection