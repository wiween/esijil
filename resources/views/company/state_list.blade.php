@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Muat Turun Data : Maklumat Batch
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
                    </label>
                    <div class="col-md-6">
                        {{ Request::segment(3) }} : {{ $state->name }}
                        @include('partials.error_block', ['item' => 'state'])
                    </div>
                </div>
                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                    <label for="state" class="col-md-4 control-label">
                        Jenis Pengajian
                    </label>
                    <div class="col-md-6">
                        {{ strtoupper(Request::segment(4)) }}
                        @include('partials.error_block', ['item' => 'type'])
                    </div>
                </div>

                <div class="form-group{{ $errors->has('batch') ? ' has-error' : '' }}">
                    <label for="batch" class="col-md-4 control-label">
                        Senarai No Batch :
                    </label>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            {{--<th></th>--}}
                            <th>No Batch</th>
                            <th>Siri</th>
                            {{--<th>Jumlah Data</th>--}}
                            {{--<th>Status</th>--}}
                            <th>Action</th>
                        </tr>
                        @foreach($batches as $batch)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                {{--<td><input name="batch[]" type="checkbox" value="{{ old('batch',$batch->batch_id) }}"></td>--}}
                                <td><a href="{{ url('') }}/company-download/list/{{ $batch->batch_id }}">[ {{  $batch->batch_id }} ]</a></td>
                                <td>{{ $batch->session }}</td>
                                {{--<td>{{ $batch->count() }}</td>--}}
                                <td>
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="{{ url('') }}/company-download/list/{{ $batch->batch_id }}"><i class="icon-display text-primary"></i>Lihat Senarai</a></li>
                                                <li><a href="{{ url('') }}/company-download/download/{{ $batch->batch_id }}"><i class="icon-download10 text-primary"></i>Muat Turun</a></li>
                                                <li><a href="{{ url('') }}/company-download/printed/{{ $batch->batch_id }}/{{ Request::segment(4) }}"><i class="icon-database-edit2 text-primary"></i>Percetakan</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            @include('partials.error_block', ['item' => 'batch'])
                        @endforeach
                    </table>
                </div>


                {{-- Submit Button --}}
                {{--<div class="form-group">--}}
                    {{--<div class="col-md-12 col-md-offset-10">--}}
                        {{--<button type="submit" class="btn btn-primary">--}}
                            {{--Muat Turun Data--}}
                        {{--</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </form>
        </div>
    </div>
@endsection

@section('footer_script')
@endsection
