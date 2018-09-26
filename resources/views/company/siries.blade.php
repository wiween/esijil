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
                        Batch No
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
                        {{  strtoupper(Request::segment(4)) }}
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

                {{-- date_print--}}
                <div class="form-group{{ $errors->has('date_print') ? ' has-error' : '' }}">
                    <label for="date_print" class="col-md-4 control-label">
                        Tarikh Cetak
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input name="date_print" type="date" class="form-control" value="{{ old('date_print') }}"
                               required>
                        @include('partials.error_block', ['item' => 'date_print'])
                    </div>
                </div>
                <div class="form-group">
                <div class="col-md-4">
                    <h6>PANDUAN : No Digit Terahir Bagi Setiap Sijil</h6>
                </div>
                    <div class="col-md-6">
                    @php
                        foreach($seqs as $key => $val)
                        {
                            echo strtoupper($key) . " - " . str_pad($val, 6, '0', STR_PAD_LEFT) . "<br/>";
                        }
                    @endphp
                </div>
                </div>

                {{-- Mula No Siri --}}
                <div class="form-group">
                    <label for="siries" class="col-md-4 control-label">
                        Masukkan Permulaan No Siri
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-2 {{ $errors->has('start_siries') ? ' has-error' : '' }}">
                        <select id="start_siries" name="start_siries" class="form-control">
                            <option value="0"><< Sila Pilih >></option>
                            <?php
                                foreach($seqs as $key => $val)
                                {
                                    echo "<option value=\"" . strtoupper($key) . "\" data-runnum=\"" . $val . "\">" . strtoupper($key) . "</option>";
                                }
                            ?>
                        </select>
                        @include('partials.error_block', ['item' => 'start_siries'])
                    </div>
                    {{--<div class="col-md-2">No Akhir ialah : @if ($a == '')--}}
                            {{--000000--}}
                        {{--@else--}}
                            {{--{{ $a->certificate_number }}--}}
                        {{--@endif--}}
                    {{--</div>--}}
                    <div class="col-md-3 {{ $errors->has('siries') ? ' has-error' : '' }}">
                        <input id="siries" name="siries" type="text" class="form-control" value="{{ old('siries') }}" 
                               placeholder="6 Digit No cth: 000998" required>
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
<script>
    $(document).ready(function() {
        $('#start_siries').on('change', function(){
            var runnum = $(this).find(':selected').data('runnum');
            if($(this).val() != '0')
            {
                return $('#siries').val(padLeft(parseInt(runnum)+1, 6))
            }

            $('#siries').val('');
        });
    });

    function padLeft(nr, n, str){
    return Array(n-String(nr).length+1).join(str||'0')+nr;
    }
</script>
@endsection