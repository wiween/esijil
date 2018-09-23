@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    My Inbox
@endsection

@section('topButton')

@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">

               <div>
                <hr>
            </div>
            <div>
                <h3>My Inbox</h3>
            </div>
            <div>
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>No Batch</th>
                        <th>Negeri</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($certificates as $certificate)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>

                    <td><a href="{{ url('') }}/print/print-list/{{ $certificate->batch_id }}">{{ $certificate->batch_id }}</a></td>

                        <td>{{ $certificate->state->name }}</td>
                        <td>
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="/print/show/{{ $certificate->id }}"><i class="icon-display text-primary"></i>Lihat & Edit</a></li>
                                        <li><a href="/print/print/{{ $certificate->id }}"><i class="icon-printer text-success"></i>Cetak</a></li>
                                        <li><a href="/print/destroy/{{ $certificate->id }}"><i class="icon-trash text-danger-600"></i>Hapus</a></li>
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
