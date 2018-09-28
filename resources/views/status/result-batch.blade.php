@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><img src="images/jatasmall.jpg"> Semak Status</div>

                    <div class="card-body">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-md-12">
                                    {{-- TABLE HERE --}}
                                    <table class="table table-striped">
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Batch No</th>
                                            <th>No KP</th>
                                            <th>Status Semasa</th>
                                            <th>Tarikh Cetak</th>
                                            <th>Tarikh Pos</th>
                                            <th>Tarikh Terima</th>
                                            <th>Nama Penerima</th>
                                        </tr>
                                        @foreach ($certificates as $certificate)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $certificate->name }}</td>
                                                <td>{{ $certificate->batch_id }}</td>
                                                <td>{{ $certificate->ic_number }}</td>
                                                <td>{{ ucwords($certificate->current_status) }}</td>
                                                @if ($certificate->current_status == 'telah dicetak' || $certificate->current_status == 'telah dipos' || $certificate->current_status == 'telah diterima')
                                                    <td>{{ $certificate->date_print->format('d M, Y') }}</td>
                                                    @else
                                                    <td>Tiada</td>
                                                @endif
                                                @if ($certificate->current_status == 'telah dipos' || $certificate->current_status == 'telah diterima')
                                                    <td>{{ $certificate->date_post->format('d M, Y') }}</td>
                                                @else
                                                    <td>Tiada</td>
                                                @endif
                                                    @if ($certificate->flag_received == 'Y')
                                                        <td>{{ $certificate->date_receive->format('d M, Y') }}</td>
                                                        <td>{{ $certificate->receiver }}</td>
                                                    @else
                                                        <td>Tiada</td>
                                                        <td>Tiada</td>
                                                    @endif

                                            </tr>
                                        @endforeach
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
