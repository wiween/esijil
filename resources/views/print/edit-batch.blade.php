@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Edit Maklumat Percetakan Oleh Syarikat : Maklumat Batch
@endsection

@section('topButton')

@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
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
                    @foreach($certificates as $certificate)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            {{--<td><input name="batch[]" type="checkbox" value="{{ old('batch',$certificate->batch_id) }}"></td>--}}
                            <td><a href="{{ url('') }}/print/edit-batchlist/{{ $certificate->batch_id }}">[ {{  $certificate->batch_id }} ]</a></td>
                            <td>{{ $total = \App\Certificate::where('batch_id', $certificate->batch_id)->where('flag_printed', 'Y')->groupBy('batch_id')->where('source', 'syarikat')->count() }}</td>
                            <td>{{ $certificate->type }}</td>
                            <td>
                                <ul class="icons-list">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="{{ url('') }}/print/edit-batchlist/{{ $certificate->batch_id }}"><i class="icon-display text-primary"></i>Lihat Senarai</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        @include('partials.error_block', ['item' => 'batch'])
                    @endforeach
                </table>
            </div>

        </div>
    </div>
@endsection

@section('footer_script')
@endsection
