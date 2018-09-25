@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    <img src="/images/jatasmall.jpg"> Log Status eSijil : {{ $certificate->ic_number }}
@endsection

@section('topButton')
    {{--<a href="/admin/audit-trail" class="btn btn-link btn-float has-text">--}}
        {{--<i class="icon-list-numbered text-primary"></i>--}}
        {{--<span>All Trails</span>--}}
    {{--</a>--}}
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-12">
                {{-- TABLE HERE --}}
                <table class="table table-striped">
                    <tr>
                        <th class="col-md-3">Name</th>
                        <td>{{ $certificate->name }}</td>
                    </tr>

                    <tr>
                        <th class="col-md-3">No ID</th>
                        <td>{{ $certificate->ic_number }}</td>
                    </tr>

                    <tr>
                        <th class="col-md-3">Status Semasa</th>
                        <td>{{ $certificate->current_status }}</td>
                    </tr>

                    @if ($certificate->current_status == 'telah dicetak' || $certificate->current_status == 'telah dipos' || $certificate->current_status == 'telah diterima')
                           <tr>
                            <th class="col-md-3">Tarikh Cetak</th>
                            <td>{{ $certificate->date_print->format('d M, Y') }}</td>
                        </tr>
                    @endif

                    {{--pos--}}
                    @if ($certificate->current_status == 'telah dipos' || $certificate->current_status == 'telah diterima')
                        <tr>
                            <th class="col-md-3">Tarikh Hantar</th>
                            <td>{{ $post->date_post->format('d M, Y') }}</td>
                        </tr>
                    @if ($post->flag_received == 'Y')
                        <tr>
                            <th class="col-md-3">Tarikh Terima</th>
                            <td>{{ $post->date_receive->format('d M, Y') }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3">Nama Penerima</th>
                            <td>{{ $post->receiver }}</td>
                        </tr>
                        @endif
                    @endif

                </table>

            </div>
        </div>
    </div>
@endsection

@section('footer_script')
@endsection











