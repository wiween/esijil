@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Konfigurasi Pembolehubah Sistem
@endsection

@section('topButton')

@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">

            <div>
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Kod</th>
                        <th>Nilai</th>
                        <th>Action</th>
                    </tr>
                    @foreach($sysVars as $var)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $var->code }}</td>
                        <td>{{ $var->value }}</td>
                        <td>
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{ url('settings/sysvar/'.$var->id) }}"><i class="icon-display text-primary"></i>Lihat & Edit</a></li>
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
