@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Senarai Penggantian Sijil
@endsection

@section('topButton')
    {{--<a href="/replacement/print" class="btn btn-link btn-float has-text">--}}
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
                            <th>Name</th>
                            <th>Jenis Penggantian</th>
                            <th>Sebab Penggantian</th>
                            <th>Bil Cetakan</th>
                            <th>Tarikh Penggantian</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($replacements as $replacement)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><a href="{{ url('') }}/replacement/show/{{ $replacement->id }}">{{ $replacement->certificate->name }}</a> </td>
                                <td>{{ ucwords($replacement->type_replacement) }}</td>
                                <td>{{ ucwords($replacement->reason) }}</td>
                                <td>{{ ucwords($replacement->printed_remark) }}</td>
                                <td>{{ $replacement->date_replacement->format('d M, Y') }}</td>
                                <td>
                                    @if ($replacement->status == 'active')
                                        <span class="label label-success">{{ $replacement->status }}</span>
                                    @elseif($replacement->status == 'banned')
                                        <span class="label label-warning">{{ $replacement->status }}</span>
                                    @else
                                        <span class="label label-default">{{ $replacement->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="{{ url('') }}/replacement/show/{{ $replacement->id }}"><i class="icon-display"></i>Lihat & Edit</a></li>
                                                {{--@if (($replacement->type_replacement == 'rosak') || ($replacement->type_replacement == 'ganti'))--}}
                                                <li><a href="{{ url('') }}/replacement/epayment/{{ $replacement->id }}"><i class="icon-coins"></i>Pembayaran</a></li>
                                                {{--@endif--}}
                                                {{--<li><a href="{{ url('') }}/print/print/{{ $replacement->certificate_id }}"><i class="icon-printer text-success"></i>Cetak</a></li>--}}
                                                <li><a href="{{ url('') }}/replacement/destroy/{{ $replacement->id }}"><i class="icon-trash text-danger-600"></i>Hapus</a></li>
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
