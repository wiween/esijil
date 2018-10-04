@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Detail of {{ $user->name }}
@endsection

@section('topButton')
    <a href="{{ url('') }}/user" class="btn btn-link btn-float has-text">
        <i class="icon-list-numbered text-primary"></i>
        <span>All Users</span>
    </a>
    <a href="{{ url('') }}/user/edit/{{ $user->id }}" class="btn btn-link btn-float has-text">
        <i class="icon-pencil text-primary"></i>
        <span>Edit</span>
    </a>
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-3">
                {{-- PHOTO HERE--}}
                <img src="{{ $user->avatar }}" class="img img-thumbnail img-responsive">
            </div>
            <div class="col-md-6">
                {{-- TABLE HERE --}}
                <table class="table table-striped">
                    <tr>
                        <th class="col-md-3">Nama</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>No KP</th>
                        <td>{{ $user->ic_number }}</td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td class="text-capitalize">{{ str_replace('_', ' ', $user->role) }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Pengguna</th>
                        <td class="text-capitalize">{{ str_replace('_', ' ', $user->user_type) }}</td>
                    </tr>
                    <tr>
                        <th>Emel</th>
                        {{-- <a href="mailto:arhamzul@gmail.com">Click Here to send mail</a> --}}
                        <td><a href="mailto:{{ $user->email }}">
                                {{ $user->email }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>No Tel</th>
                        <td>
                            <a href="tel:{{ $user->phone_number }}">
                                {{ $user->phone_number }}
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td class="text-capitalize">
                            @if ($user->status == 'active')
                                <span class="label label-success">{{ $user->status }}</span>
                            @elseif($user->status == 'banned')
                                <span class="label label-warning">{{ $user->status }}</span>
                            @else
                                <span class="label label-default">{{ $user->status }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Catatan</th>
                        <td>{{ $user->remark }}</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>
                            {{ $user->created_at->format('d M, Y') }}
                        </td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>
                            {{ $user->updated_at->format('d M, Y') }}
                        </td>
                    </tr>
                </table>
                <br>
                <a href="{{ url('') }}/user/edit/{{ $user->id }}" class="btn btn-primary btn-block">Edit User Record</a>

            </div>
        </div>
    </div>
@endsection

@section('footer_script')
@endsection











