@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Pengesahan Oleh Jawatakuasa Penilaian Persijilan : Batch Mengikut Negeri
@endsection

@section('topButton')

@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                    <label for="state" class="col-md-4 control-label">
                        Negeri
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        {{ Request::segment(3) }} : {{ $state->name }}
                        @include('partials.error_block', ['item' => 'state'])
                    </div>
                </div>

                <div class="form-group{{ $errors->has('batch') ? ' has-error' : '' }}">
                    <label for="batch" class="col-md-4 control-label">
                        Senarai Batch
                        <span class="text-danger"> * </span>
                    </label>

                    <div class="col-md-6">
                        @foreach($batches as $batch)
                            <input type="checkbox" name="batch[]" value="{{ old('batch', $batch->batch_id) }}">
                            <a href="{{ url('') }}/board/list/{{ $batch->batch_id }}">[ {{  $batch->batch_id }} ]</a>
                            <br>
                            @include('partials.error_block', ['item' => 'batch'])
                        @endforeach
                    </div>

                </div>

               {{--Pengesahan Board--}}
                <div class="form-group{{ $errors->has('board_confirm') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">
                       Pengesahan Jawatankuasa ?
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input name="board_confirm" type="radio" value="Y" @if(old('board_confirm')) checked @endif> Disahkan
                        <input name="board_confirm" type="radio" value="R" @if(old('board_confirm')) checked @endif> Ditolak
                        <input name="board_confirm" type="radio" value="K" @if(old('board_confirm')) checked @endif> KIV
                        @include('partials.error_block', ['item' => 'board_confirm'])
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
@endsection

@section('footer_script')
@endsection
