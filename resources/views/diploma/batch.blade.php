@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Program DKM dan DLKM
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
                            <th>Batch No</th>
                            <th>Nama Program</th>
                            <th>Kod Program NOSS</th>
                            <th>Tahap</th>
                            <th>Jenis Pentauliahan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($certificates as $certificate)
                           <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><a href="{{ url('') }}/diploma/edit-batch/{{ $certificate->batch_id }}">{{ $certificate->batch_id }}</a> </td>
                                <td>{{ $certificate->programme_name }}</td>
                                <td>{{ $certificate->programme_code }}</td>
                                <td>{{ $certificate->level }}</td>
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
                                                <li><a href="{{ url('') }}/diploma/list/{{ $certificate->batch_id }}"><i class="icon-display text-primary"></i>Lihat Senarai</a></li>
                                                <li><a href="{{ url('') }}/diploma/edit-batch/{{ $certificate->batch_id }}"><i class="icon-pencil text-primary"></i>Edit</a></li>
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
