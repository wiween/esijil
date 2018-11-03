@extends('layouts.app_login')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="row justify-content-center">
                        <img src="{{ asset('images/jata.png') }}" alt="Jata Malaysia">
                    </div>
                    <div class="row justify-content-center">
                        <h2 style="text-align: center"><b>MAKLUMAT PERSIJILAN PELATIH DIBAWAH SISTEM PERSIJILAN
                                KEMAHIRAN MALAYSIA(SPKM)</b></h2>
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
                                            <th>No KP :</th>
                                            <td>{{ $certificate->ic_number }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama :</th>
                                            <td>{{ strtoupper($certificate->name) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Batch No/Angka Giliran :</th>
                                            <td>{{ strtoupper($certificate->batch_id) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama Sijil :</th>
                                            @if ($certificate->level == 'TAHAP LIMA' || $certificate->level == 'Tahap Lima' || $certificate->level == '5')
                                                <td>DIPLOMA LANJUTAN KEMAHIRAN MALAYSIA</td>
                                            @elseif ($certificate->level == 'TAHAP EMPAT' || $certificate->level == 'Tahap Empat' || $certificate->level == '4')
                                                <td>DIPLOMA KEMAHIRAN MALAYSIA</td>
                                            @else
                                                <td>SIJIL KEMAHIRAN MALAYSIA</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th>Tahap :</th>
                                            <td>{{  strtoupper($certificate->level) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kod Program :</th>
                                            <td>{{ $certificate->programme_code }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama Program :</th>
                                            <td>{{ strtoupper($certificate->programme_name) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama Pusat Bertauliah/Agensi :</th>
                                            <td>{{ strtoupper($certificate->pb_name) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Negeri :</th>
                                            <td>{{ strtoupper($certificate->state->name) }}</td>
                                        </tr>
                                        <tr>
                                            <th>No Sijil</th>
                                            <td>{{ $certificate->certificate_number }}</td>
                                        </tr>
                                        @if ($certificate->type == 'NDT')
                                            <tr>
                                                <th>Tarikh Sah Sijil</th>
                                                <td>{{ $certificate->ndt_sah_mula }} - {{ $certificate->ndt_sah_tamat }}</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <th>Tarikh PPL :</th>
                                                <td>{{ $certificate->date_ppl }}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <th>Tarikh Cetak Sijil</th>
                                            <td>{{ $certificate->date_print->format('d M, Y') }}</td>
                                        </tr>
                                        {{--<tr>--}}
                                        {{--<th>Keputusan</th>--}}
                                        {{--<td>Terampil</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                        {{--<th>Address</th>--}}
                                        {{--<td>{{ $certificate->address }}</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                        {{--<th>Status</th>--}}
                                        {{--<td class="text-capitalize">--}}
                                        {{--@if ($certificate->status == 'Published')--}}
                                        {{--<span class="label label-success">{{ $certificate->status }}</span>--}}
                                        {{--@elseif($certificate->status == 'Unpublished')--}}
                                        {{--<span class="label label-warning">{{ $certificate->status }}</span>--}}
                                        {{--@else--}}
                                        {{--<span class="label label-default">{{ $certificate->status }}</span>--}}
                                        {{--@endif--}}
                                        {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                        {{--<th>Flag Sudah Dicetak</th>--}}
                                        {{--<td>{{ $certificate->flag_printed }}</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                        {{--<th>Description</th>--}}
                                        {{--<td>{{ $certificate->description }}</td>--}}
                                        {{--</tr>--}}

                                        {{--<tr>--}}
                                        {{--<th>Remark</th>--}}
                                        {{--<td>{{ $certificate->remark }}</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                        {{--<th>Created At</th>--}}
                                        {{--<td>--}}
                                        {{--{{ $certificate->created_at->format('d M, Y') }}--}}
                                        {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                        {{--<th>Updated At</th>--}}
                                        {{--<td>--}}
                                        {{--{{ $certificate->updated_at->format('d M, Y') }}--}}
                                        {{--</td>--}}
                                        {{--</tr>--}}

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
