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
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                {{-- ic number --}}
                <div class="form-group{{ $errors->has('ic_number') ? ' has-error' : '' }}">
                    <label for="ic_number" class="col-md-4 control-label">
                        No KP
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
                        Batch No
                    </label>
                    <div class="col-md-6">
                        {{ $certificate->batch_id }}
                    </div>
                </div>

               {{-- Venue --}}
                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    <label for="address" class="col-md-4 control-label">
                       Alamat
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">{{  $certificate->address }}
                        @include('partials.error_block', ['item' => 'address'])
                    </div>
                </div>

                {{-- Status --}}
                {{--<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">--}}
                    {{--<label class="col-md-4 control-label">--}}
                        {{--Status--}}
                        {{--<span class="text-danger"> * </span>--}}
                    {{--</label>--}}
                    {{--<div class="col-md-6">--}}
                        {{--<select name="status" class="form-control">--}}
                            {{--<option selected>Select one..</option>--}}
                            {{--@foreach ($statuses as $status)--}}
                                {{--<option @if (old('status',$certificate->status) == $status->key) selected @endif value="{{ $status->key }}">{{ $status->value }}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                        {{--@include('partials.error_block', ['item' => 'status'])--}}
                    {{--</div>--}}
                {{--</div>--}}

                <!--flag -->
                {{--<div class="form-group{{ $errors->has('flag') ? ' has-error' : '' }}">--}}
                    {{--<label class="col-md-4 control-label">--}}
                        {{--Flag Cetak--}}
                        {{--<span class="text-danger"> * </span>--}}
                    {{--</label>--}}
                    {{--<div class="col-md-6">--}}
                        {{--<input name="flag" type="radio" value="Y" @if(old('flag', $certificate->flag_printed)== 'Y') checked @endif> Ya--}}
                        {{--<input name="flag" type="radio" value="N" @if(old('flag', $certificate->flag_printed)== 'N') checked @endif> Tidak--}}
                        {{--@include('partials.error_block', ['item' => 'flag'])--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{-- date_print--}}
                <div class="form-group{{ $errors->has('date_print') ? ' has-error' : '' }}">
                    <label for="date_print" class="col-md-4 control-label">
                        Tarikh Cetak
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input name="date_print" type="date" class="form-control" value="{{ old('date_print', $certificate->date_print->format('Y-m-d')) }}" required>
                        @include('partials.error_block', ['item' => 'date_print'])
                    </div>
                </div>
                {{-- No sijil asal--}}
                <div class="form-group{{ $errors->has('certificate_number') ? ' has-error' : '' }}">
                    <label for="date_print" class="col-md-4 control-label">
                        No Sijil Asal
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        {{ $certificate->certificate_number }}
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
                            foreach ($seqs as $key => $val) {
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

                {{-- Remark --}}
                <div class="form-group{{ $errors->has('remark') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Remark</label>
                    <div class="col-md-6">
                        <textarea name="remark" class="form-control" rows="3">{{ old('remark', $certificate->remark) }}</textarea>
                    </div>
                    @include('partials.error_block', ['item' => 'remark'])
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