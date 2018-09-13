@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Senarai Penggantian Sijil
@endsection

@section('topButton')

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
                            <th>No Sijil</th>
                            <th>Jenis Pengajian</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($certificates as $certificate)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><a href="/replacement/show/{{ $certificate->id }}">{{ $certificate->name }}</a> </td>
                                <td>{{ $certificate->certificate_number }}</td>
                                <td>{{ $certificate->type }}</td>
                                <td>
                                    @if ($certificate->status == 'active')
                                        <span class="label label-success">{{ $certificate->status }}</span>
                                    @elseif($certificate->status == 'banned')
                                        <span class="label label-warning">{{ $certificate->status }}</span>
                                    @else
                                        <span class="label label-default">{{ $certificate->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="/replacement/show/{{ $certificate->id }}/{{ $certificate->certificate_number }}"><i class="icon-display"></i>Lihat</a></li>
                                                <li><a href="/replacement/create/{{ $certificate->id }}/{{ $certificate->certificate_number }}"><i class="icon-chair"></i>Penggantian</a></li>
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
