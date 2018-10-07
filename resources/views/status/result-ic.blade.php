@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="row justify-content-center">
                        <img src="{{ asset('images/jata.png') }}" alt="Jata Malaysia">
                    </div>
                    <div class="row justify-content-center">
                        <h2 style="text-align: center"><b>SEMAKAN STATUS PENGELUARAN SIJIL</b></h2>
                    </div>
                    <div class="row justify-content-center">
                        <h3>JABATAN PEMBANGUNAN KEMAHIRAN</h3>
                    </div>
                    <div class="row justify-content-center">
                        <h3>KEMENTERIAN SUMBER MANUSIA</h3>
                    </div>

                    <div class="card-body">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-md-12">
                                    {{-- TABLE HERE --}}
                                    <table class="table table-striped">
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>No KP</th>
                                            <th>Batch No/Angka Giliran</th>
                                            <th>Status Semasa</th>
                                            <th>No Tracking</th>
                                            <th>Tarikh Cetak</th>
                                            <th>Tarikh Hantar</th>
                                            <th>Tarikh Terima</th>
                                            <th>Nama Penerima</th>
                                            <th>No KP Penerima</th>
                                        </tr>
                                        @foreach ($certificates as $certificate)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $certificate->name }}</td>
                                                <td>{{ $certificate->ic_number }}</td>
                                                <td>{{ $certificate->batch_id }}</td>
                                                <td>{{ ucwords($certificate->current_status) }}</td>
                                                <td>{{ $certificate->tracking_number }}</td>
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
                                                        <td>{{ $certificate->icno_receiver }}</td>
                                                    @else
                                                        <td>Tiada</td>
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
