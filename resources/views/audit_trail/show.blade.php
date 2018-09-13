@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Audit Trail Detail
@endsection

@section('topButton')
    <a href="/admin/audit-trail" class="btn btn-link btn-float has-text">
        <i class="icon-list-numbered text-primary"></i>
        <span>All Trails</span>
    </a>
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-3">
                {{-- PHOTO HERE--}}
                <img src="{{ $audit->user->avatar }}" class="img img-thumbnail img-responsive">
                <h6 class="text-uppercase text-center">{{ $audit->user->name }}</h6>
            </div>
            <div class="col-md-6">
                {{-- TABLE HERE --}}
                <table class="table table-striped">
                    <tr>
                        <th class="col-md-3">User Name</th>
                        <td>{{ $audit->user->name }}</td>
                    </tr>

                    <tr>
                        <th class="col-md-3">IP Address</th>
                        <td>{{ $audit->ip }}</td>
                    </tr>

                    <tr>
                        <th class="col-md-3">URL</th>
                        <td>{{ $audit->url }}</td>
                    </tr>

                    <tr>
                        <th>Flag</th>
                        <td class="text-capitalize">
                            @if ($audit->flag == 'normal')
                                <span class="label label-success">{{ $audit->flag }}</span>
                            @elseif($audit->flag == 'warning')
                                <span class="label label-warning">{{ $audit->flag }}</span>
                            @else
                                <span class="label label-default">{{ $audit->flag }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>
                            {{ $audit->created_at->format('d M, Y') }}
                        </td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>
                            {{ $audit->updated_at->format('d M, Y') }}
                        </td>
                    </tr>
                    <tr>
                        <th>Note</th>
                        <td>
                            <form class="form-horizontal" role="form" method="POST" action="/audit-trail/update/{{ $audit->id }}">
                                {{ csrf_field() }}

                                {{-- Remark --}}
                                <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
                                    <textarea name="note" class="form-control" rows="3">{{ $audit->note }}</textarea>
                                    @include('partials.error_block', ['item' => 'note'])
                                </div>

                                {{-- Submit Button --}}
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Update Trail
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>

                </table>

            </div>
        </div>
    </div>
@endsection

@section('footer_script')
@endsection











