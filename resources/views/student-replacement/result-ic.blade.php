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
                                            <th>No Sijil</th>
                                            {{--<th>Pusat Bertauliah</th>--}}
                                            <th>Tahap</th>
                                            {{--<th>Jenis Pentauliahan</th>--}}
                                            <th>Tarikh Cetak</th>
                                            <th>Action</th>
                                            {{--<th>No KP Penerima</th>--}}
                                        </tr>
                                        @foreach ($certificates as $certificate)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $certificate->name }}</td>
                                                <td>{{ $certificate->ic_number }}</td>
                                                <td>{{ $certificate->batch_id }}</td>
                                                <td>{{ $certificate->certificate_number }}</td>
                                                {{--<td>{{ $certificate->pb_name }}</td>--}}
                                                <td>{{ $certificate->level }}</td>
                                                {{--<td>{{ $certificate->type }}</td>--}}
                                                <td>{{ $certificate->date_print }}</td>
                                                <td><a href="/ganti/create/{{ $certificate->id }}"><input type="button" value="Penggantian Sijil"></a> </td>
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
