@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Hasil Carian : Penggantian
@endsection

@section('topButton')
    {{--<a href="/printcertificate/print" class="btn btn-link btn-float has-text">--}}
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
                            <th>No KP</th>
                            <th>Nama</th>
                            <th>Batch No</th>
                            <th>Status Semasa</th>
                            {{--<th>Status</th>--}}
                            <th>Action</th>
                        </tr>
                        @foreach ($certificates as $certificate)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $certificate->ic_number }}</td>
                                <td><a href="{{ url('') }}/certificate/show/{{ $certificate->id }}">{{ $certificate->name }}</a> </td>
                                <td>{{ $certificate->batch_id }}</td>
                                <td>{{ ucwords($certificate->current_status) }}</td>
                                {{--<td>--}}
                                {{--@if ($certificate->status == 'active')--}}
                                {{--<span class="label label-success">{{ $certificate->status }}</span>--}}
                                {{--@elseif($certificate->status == 'banned')--}}
                                {{--<span class="label label-warning">{{ $certificate->status }}</span>--}}
                                {{--@else--}}
                                {{--<span class="label label-default">{{ $certificate->status }}</span>--}}
                                {{--@endif--}}
                                {{--</td>--}}
                                <td>
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="{{ url('') }}/replacement/list/{{ $certificate->ic_number }}"><i class="icon-add-to-list text-success"></i>Penggantian</a></li>
                                                {{--<li><a href="post/create/{{ $certificate->id }}"><i class="icon-mailbox text-success"></i>Pembungkusan</a></li>--}}
                                                {{--<li><a href="{{ url('') }}/status/{{ $certificate->ic_number }}"><i class="icon-reading text-success"></i>Semak Status</a></li>--}}
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