@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Semak Status</div>

                    <div class="card-body">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-md-12">
                                    {{-- TABLE HERE --}}
                                    <table class="table table-striped">
                                        <tr>
                                            <th class="col-md-3">Name</th>
                                            <td>{{ $post->certificate->name }}</td>
                                        </tr>

                                        <tr>
                                            <th class="col-md-3">No ID</th>
                                            <td>{{ $post->certificate->ic_number }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-md-3">Status Semasa</th>
                                            <td>{{ $certificate->current_status }}</td>
                                        </tr>

                                        @if ($certificate->current_status == 'telah dicetak' || $certificate->current_status == 'telah dipos')
                                            <tr>
                                                <th class="col-md-3">Tarikh Cetak</th>
                                                <td>{{ $certificate->date_print }}</td>
                                            </tr>
                                        @endif

                                        @if ($certificate->current_status == 'telah dipos')
                                            <tr>
                                                <th class="col-md-3">Tarikh Hantar</th>
                                                <td>{{ $post->date_post->format('d M, Y') }}</td>
                                            </tr>
                                        @endif
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
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
