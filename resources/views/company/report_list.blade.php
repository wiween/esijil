@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
   Laporan Oleh Syarikat : Batch
@endsection

@section('topButton')

@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST">
                {{ csrf_field() }}
                <div class="col-md-12">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            {{--<th></th>--}}
                            <th>No Batch</th>
                            <th>Jumlah Data</th>
                            <th>Jenis Pengajian</th>
                            <th>Action</th>
                        </tr>
                        @foreach($batches as $batch)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                {{--<td><input name="batch[]" type="checkbox" value="{{ old('batch',$batch->batch_id) }}"></td>--}}
                                <td>{{  $batch->batch_id }}</td>
                                <td>{{ $batch->jumlahstudent }}</td>
                                <td>{{ strtoupper($batch->type) }}</td>
                                <td>
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="/company-report/pdf/F/{{ $batch->batch_id }}/{{ $batch->type }}"><i class="icon-file-pdf text-primary"></i>Papar Laporan F</a></li>
                                                <li><a href="/company-report/pdf/G/{{ $batch->batch_id }}/{{ $batch->type }}"><i class="icon-file-pdf text-danger"></i>Papar Laporan G</a></li>
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
