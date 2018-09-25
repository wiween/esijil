@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    User
@endsection

@section('topButton')
    <a href="{{ url('') }}/admin/user/create" class="btn btn-link btn-float has-text">
        <i class="icon-plus-circle2 text-primary"></i>
        <span>New User</span>
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
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>IC Number</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td class="col-md-1">
                                <img class="img-responsive img-thumbnail" src="{{ $user->avatar }}">
                            </td>
                            <td><a href="{{ url('') }}/user/show/{{ $user->id }}">{{ $user->name }}</a> </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->ic_number }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td class="text-capitalize">{{ str_replace('_', ' ', $user->role )}}</td>
                            <td>
                                @if ($user->status == 'active')
                                    <span class="label label-success">{{ $user->status }}</span>
                                @elseif($user->status == 'banned')
                                    <span class="label label-warning">{{ $user->status }}</span>
                                @else
                                    <span class="label label-default">{{ $user->status }}</span>
                                @endif
                            </td>
                            <td>
                                <ul class="icons-list">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="{{ url('') }}/user/show/{{ $user->id }}"><i class="icon-display"></i> View</a></li>
                                            <li><a href="{{ url('') }}/user/reset-password/{{ $user->id }}"><i class="icon-lock"></i> Reset Password</a></li>
                                            <li><a href="{{ url('') }}/user/edit/{{ $user->id }}"><i class="icon-pencil"></i> Edit</a></li>
                                            <li><a href="{{ url('') }}/user/destroy/{{ $user->id }}"><i class="icon-trash"></i> Delete</a></li>
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
