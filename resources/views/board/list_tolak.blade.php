@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Selesai Pengesahan Jawatan Kuasa : Ditolak
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
                            <th>Batch ID</th>
                            <th>Negeri</th>
                            {{--<th>Action</th>--}}
                        </tr>
                        @foreach ($espkms as $espkm)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><a href="{{ url('') }}/board/list-tolak/{{ $espkm->batch_id }}">{{ $espkm->batch_id }}</a></td>
                                <td>{{ $espkm->state->name }}</td>
                                {{--<td>--}}
                                {{--<ul class="icons-list">--}}
                                {{--<li class="dropdown">--}}
                                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                                {{--<i class="icon-menu9"></i>--}}
                                {{--</a>--}}

                                {{--<ul class="dropdown-menu dropdown-menu-right">--}}
                                {{--<li><a href="/print/show/{{ $espkm->id }}"><i class="icon-display text-primary"></i>Lihat & Edit</a></li>--}}
                                {{--<li><a href="/certificate/job/{{ $espkm->id }}"><i class="icon-display text-primary"></i>Agihan Tugasan</a></li>--}}
                                {{--<li><a href="/print/print/{{ $espkm->id }}"><i class="icon-printer text-success"></i>Cetak</a></li>--}}
                                {{--<li><a href="/print/destroy/{{ $espkm->id }}"><i class="icon-trash text-danger-600"></i>Hapus</a></li>--}}
                                {{--<li><a href="/print/set-flag/Y/{{ $espkm->id }}"><i class="icon-flag8 text-black-600"></i>Set Flag Cetak</a></li>--}}
                                {{--</ul>--}}
                                {{--</li>--}}
                                {{--</ul>--}}
                                {{--</td>--}}
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
