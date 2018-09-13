@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Role
@endsection

@section('topButton')
    <a href="/lookup/role" class="btn btn-link btn-float has-text">
        <i class="icon-plus-circle2 text-primary"></i>
        <span>Role</span>
    </a>
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
                            <th>Nick</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><a href="/lookups/role/{{ $role->id }}">{{ $role->name }}</a> </td>



                                <td class="text-capitalize">{{ str_replace('_', ' ', $role->name )}}</td>
                                <td>
                                    @if ($role->status == 'active')
                                        <span class="label label-success">{{ $role->status }}</span>
                                    @elseif($role->status == 'banned')
                                        <span class="label label-warning">{{ $role->status }}</span>
                                    @else
                                        <span class="label label-default">{{ $role->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">

                                                <li><a href="/lookups/role/edit/{{ $role->id }}"><i class="icon-pencil"></i> Edit</a></li>
                                                <li><a href="/lookups/role/destroy/{{ $role->id }}"><i class="icon-trash"></i> Delete</a></li>
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
