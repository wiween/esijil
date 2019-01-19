@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Muat Turun Data Pelajar
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
                            <th>No ID</th>
                            <th>Name</th>
                            <th>Nama Program</th>
                            <th>Kod Program</th>
                            <th>Batch No</th>
                            <th>Tahap</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($certificates as $certificate)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $certificate->ic_number }}</td>
                                <td><a href="{{ url('') }}/company-download/show/{{ $certificate->id }}">{{ $certificate->name }}</a> </td>
                                <td>{{ $certificate->programme_name }}</td>
                                <td>{{ $certificate->programme_code }}</td>
                                <td>{{ $certificate->batch_id }}</td>
                                <td>{{ $certificate->level }}</td>
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
                                                <li><a href="{{ url('') }}/company-download/show/{{ $certificate->id }}"><i class="icon-display text-primary"></i>Lihat</a></li>
                                                <li><a href="{{ url('') }}/company-download/single/{{ $certificate->ic_number }}"><i class="icon-download10 text-primary"></i>Muat Turun</a></li>
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
