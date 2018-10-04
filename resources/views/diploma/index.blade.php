@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Senarai Program Diploma (DKM/DLKM)
@endsection

@section('topButton')
    <a href="{{ url('') }}/diploma/create" class="btn btn-link btn-float has-text">
        <i class="icon-plus-circle2 text-primary"></i>
        <span>New diploma</span>
    </a>
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Kod Program</th>
                            <th>Nama NOSS</th>
                            <th>Nama Baru</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($diplomas as $diploma)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><a href="{{ url('') }}/diploma/edit/{{ $diploma->id }}">{{ $diploma->code_programmed }}</a> </td>
                                <td>{{ $diploma->old_name }}</td>
                                <td>{{ $diploma->new_name }}</td>
                                <td>
                                    @if ($diploma->status == 'active')
                                        <span class="label label-success">{{ $diploma->status }}</span>
                                    @elseif($diploma->status == 'banned')
                                        <span class="label label-warning">{{ $diploma->status }}</span>
                                    @else
                                        <span class="label label-default">{{ $diploma->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                {{--<li><a href="{{ url('') }}/diploma/show/{{ $diploma->id }}"><i class="icon-display"></i> View</a></li>--}}
                                                <li><a href="{{ url('') }}/diploma/edit/{{ $diploma->id }}"><i class="icon-pencil"></i> Edit</a></li>
                                                <li><a href="{{ url('') }}/diploma/destroy/{{ $diploma->id }}"><i class="icon-trash"></i> Delete</a></li>
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
