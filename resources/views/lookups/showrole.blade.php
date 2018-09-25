@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Detail of {{ $role->name }}
@endsection

@section('topButton')
    <a href="{{ url('') }}/lookups/role" class="btn btn-link btn-float has-text">
        <i class="icon-list-numbered text-primary"></i>
        <span>All role</span>
    </a>
    <a href="{{ url('') }}/lookups/role/edit/{{ $role->id }}" class="btn btn-link btn-float has-text">
        <i class="icon-pencil text-primary"></i>
        <span>Edit</span>
    </a>

@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">

            <div class="col-md-12">
                {{-- TABLE HERE --}}
                <table class="table table-striped">
                    <tr>
                        <th class="col-md-4">Name</th>
                        <td>{{ $role->name }}</td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td class="text-capitalize">
                            @if ($role->status == 'active')
                                <span class="label label-success">{{ $role->status }}</span>
                            @elseif($role->status == 'banned')
                                <span class="label label-warning">{{ $role->status }}</span>
                            @else
                                <span class="label label-default">{{ $role->status }}</span>
                            @endif
                        </td>
                    </tr>


                </table>
                <br>
                <a href="{{ url('') }}/lookups/role/edit/{{ $role->id }}" class="btn btn-primary btn-block">Update role</a>

            </div>
        </div>
    </div>
@endsection

@section('footer_script')
@endsection











