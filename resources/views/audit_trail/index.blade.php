@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Audit Trail
@endsection

@section('topButton')
    {{--<a href="/audit/create" class="btn btn-link btn-float has-text">--}}
        {{--<i class="icon-plus-circle2 text-primary"></i>--}}
        {{--<span>New Audit</span>--}}
    {{--</a>--}}
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 table-responsive">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>User</th>
                            <th>IP</th>
                            <th>URL</th>
                            <th>Flag</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($audits as $audit)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $audit->id }}</td>
                            <td><a href="{{ url('') }}/user/show/{{ $audit->user_id }}">{{ $audit->user->name }}</a> </td>
                            <td>{{ $audit->ip }}</td>
                            <td>{{ $audit->url }}</td>
                            <td>
                                @if ($audit->flag == 'normal')
                                    <span class="label label-success">{{ $audit->flag }}</span>
                                @elseif($audit->flag == 'warning')
                                    <span class="label label-warning">{{ $audit->flag }}</span>
                                @else
                                    <span class="label label-default">{{ $audit->flag }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $audit->created_at->format('d M, Y') }}
                                <br>
                                {{ $audit->created_at->format('g:i:s A') }}
                            </td>
                            <td>
                                <ul class="icons-list">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="{{ url('') }}/audit-trail/show/{{ $audit->id }}"><i class="icon-display"></i> View & Edit</a></li>
                                            <li><a href="{{ url('') }}/audit-trail/set/normal/{{ $audit->id }}"><i class="icon-flag3 text-success"></i> Set to Normal</a></li>
                                            <li><a href="{{ url('') }}/audit-trail/set/warning/{{ $audit->id }}"><i class="icon-flag7 text-warning"></i> Set to Warning</a></li>
                                            <li><a href="{{ url('') }}/audit-trail/destroy/{{ $audit->id }}"><i class="icon-trash text-danger-600"></i> Delete</a></li>
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
