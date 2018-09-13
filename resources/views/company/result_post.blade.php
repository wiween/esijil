@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Kemaskini Maklumat Pembungkusan Oleh Syarikat Mengikut Batch ID
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
                            <td><a href="/company-post/list/{{ $certificate->batch_id }}/{{$certificate->type}}">[ {{  $certificate->batch_id }} ]</a></td>
                            <td>{{ $certificate->jumlahsutudent }}</td>
                            <td>{{ $certificate->type }}</td>
                            <td>
                                <ul class="icons-list">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="/company-post/list/{{ $certificate->batch_id }}/{{$certificate->type}}"><i class="icon-display text-primary"></i>Lihat Senarai</a></li>
                                            <li><a href="/company-post/create-batch/{{ $certificate->batch_id }}/{{ $certificate->type }}"><i class="icon-database-edit2 text-primary"></i>Pembungkusan</a></li>
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
