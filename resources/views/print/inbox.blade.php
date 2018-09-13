@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Cetak Sijil : Inbox
@endsection

@section('topButton')

@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <form class="form-horizontal" role="form" method="POST">
                <div class="col-md-12 table-responsive">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            {{--<th>[ Tanda ]</th>--}}
                            <th>Batch ID</th>
                            <th>Jenis Pengajian</th>
                            <th>Negeri</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($certificates as $certificate)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                {{--<td> <input type="checkbox" name="batch[]" value="{{ old('batch', $certificate->batch_id) }}"></td>--}}
                                <td><a href="/print/print-list/{{ $certificate->batch_id }}/{{ $certificate->type }}">{{ $certificate->batch_id }}</a></td>
                                <td>{{ ucwords($certificate->type) }}</td>
                                <td>{{ $certificate->state->name }}</td>
                                <td>
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="/print/print-list/{{ $certificate->batch_id }}/{{ $certificate->type }}"><i class="icon-display text-primary"></i>Senarai Pelajar</a></li>
                                                {{--<li><a href="/certificate/job/{{ $certificate->id }}"><i class="icon-display text-primary"></i>Agihan Tugasan</a></li>--}}
                                                <li><a href="/print/print/{{ $certificate->batch_id }}/{{ $certificate->type }}"><i class="icon-printer text-success"></i>Cetak</a></li>
                                                {{--<li><a href="/print/destroy/{{ $certificate->id }}"><i class="icon-trash text-danger-600"></i>Hapus</a></li>--}}
                                                {{--<li><a href="/print/set-flag/Y/{{ $certificate->id }}"><i class="icon-flag8 text-black-600"></i>Set Flag Cetak</a></li>--}}
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                {{--<div class="col-md-12 col-md-offset-10">--}}
                    {{--<button type="submit" class="btn btn-primary">--}}
                        {{--Cetak Senarai--}}
                    {{--</button>--}}
                {{--</div>--}}
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
@endsection
