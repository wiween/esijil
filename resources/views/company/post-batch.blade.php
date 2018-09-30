@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Senarai Batch Yang Selesai Pengeposan Oleh Syarikat Percetakan Luar
@endsection

@section('topButton')
    {{--<a href="/printpost/print" class="btn btn-link btn-float has-text">--}}
    {{--<i class="icon-printer2 text-primary"></i>--}}
    {{--<span>Cetak Senarai Ini</span>--}}
    {{--</a>--}}
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 table-responsive">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            {{--<th>Name</th>--}}
                            <th>Batch No</th>
                            <th>No Tracking</th>
                            <th>Tarikh Pos</th>
                            <th>Tarikh Terima</th>
                            <th>Penerima</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><a href="{{ url('') }}/company-search/detail/{{ $post->certificate_id }}">{{ $post->certificate->name }}</a> </td>
                                <td><a href="{{ url('') }}/company-search/detail-batch/{{ $post->tracking_number }}">{{ $post->certificate->batch_id }}</a></td>
                                <td>{{ $post->tracking_number }}</td>
                                <td>{{ $post->date_post->format('d M, Y') }}</td>
                                @if($post->flag_received == 'Y')
                                    <td>{{ $post->date_receive->format('d M, Y') }}</td>
                                    <td>{{ $post->receiver }}</td>
                                @else
                                    <td>Tidak Diterima</td>
                                    <td>Tiada Penerima</td>
                                @endif

                                <td>
                                    @if ($post->status == 'active')
                                        <span class="label label-success">{{ $post->status }}</span>
                                    @elseif($post->status == 'banned')
                                        <span class="label label-warning">{{ $post->status }}</span>
                                    @else
                                        <span class="label label-default">{{ $post->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="/company-search/detail-student/{{ $post->batch_id }}"><i class="icon-display"></i>Senarai Pelajar</a></li>
                                                <li><a href="/company-search/detail-batch/{{ $post->tracking_number }}"><i class="icon-display"></i>Kemaskini Semula</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
@endsection
