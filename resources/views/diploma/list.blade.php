@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Senarai Program certificate (DKM/DLKM)
@endsection

@section('topButton')
    <a href="{{ url('') }}/certificate/create" class="btn btn-link btn-float has-text">
        <i class="icon-plus-circle2 text-primary"></i>
        <span>New certificate</span>
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
                            <th>NO KP</th>
                            <th>Nama</th>
                            <th>Kod Program</th>
                            <th>Nama NOSS</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($certificates as $certificate)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><a href="{{ url('') }}/certificate/edit/{{ $certificate->id }}">{{ $certificate->ic_number }}</a> </td>
                                <td>{{ $certificate->name }}</td>
                                <td>{{ $certificate->programme_code }}</td>
                                <td>{{ $certificate->programme_name }}</td>
                                <td>
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                {{--<li><a href="{{ url('') }}/certificate/show/{{ $certificate->id }}"><i class="icon-display"></i> View</a></li>--}}
                                                <li><a href="{{ url('') }}/diploma/edit-list/{{ $certificate->id }}"><i class="icon-pencil"></i> Edit</a></li>
                                                {{--<li><a href="{{ url('') }}/certificate/destroy/{{ $certificate->id }}"><i class="icon-trash"></i> Delete</a></li>--}}
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
