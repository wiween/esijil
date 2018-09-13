@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Pengesahan Oleh Jawatakuasa Penilaian Persijilan : Senarai Pelajar Batch {{ Request::segment(3) }}
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
                            <th>Keputusan PPL</th>
                            <th>Tahap</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($espkms as $espkm)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $espkm->ic_number }}</td>
                                <td><a href="/board/show/{{ $espkm->id }}">{{ $espkm->name }}</a> </td>
                                <td>{{ $espkm->programme_name }}</td>
                                <td>{{ $espkm->programme_code }}</td>
                                <td>{{ $espkm->result_ppl }}</td>
                                <td>{{ $espkm->level }}</td>
                                <td>
                                    @if ($espkm->status == 'active')
                                        <span class="label label-success">{{ $espkm->status }}</span>
                                    @elseif($espkm->status == 'banned')
                                        <span class="label label-warning">{{ $espkm->status }}</span>
                                    @else
                                        <span class="label label-default">{{ $espkm->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="/board/show/{{ $espkm->id }}"><i class="icon-display text-primary"></i>Lihat</a></li>
                                                <li><a href="/board/set-flag/Y/{{ $espkm->id }}"><i class="icon-flag8 text-black-600"></i>DiSahkan</a></li>
                                                <li><a href="/board/set-flag/R/{{ $espkm->id }}"><i class="icon-flag4 text-danger"></i>Ditolak</a></li>
                                                <li><a href="/board/set-flag/K/{{ $espkm->id }}"><i class="icon-flag7 text-warning"></i>KIV</a></li>
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
