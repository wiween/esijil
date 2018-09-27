@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><img src="{{ asset('images/jatasmall.jpg') }}"> Maklumat Persijilan Pelatih</div>

                    <div class="card-body">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-md-12">
                {{-- TABLE HERE --}}
                <table class="table table-striped">
                    <tr>
                        <th class=" col-md-5">No KP :</th>
                        <td>{{ $certificate->ic_number }}</td>
                    </tr>
                    <tr>
                        <th class=" col-md-5">Nama :</th>
                        <td>{{ $certificate->name }}</td>
                    </tr>
                    <tr>
                        <th>Batch No :</th>
                        <td>{{ $certificate->batch_id }}</td>
                    </tr>
                    <tr>
                        <th>Kod Program :</th>
                        <td>{{ $certificate->programme_code }}</td>
                    </tr>
                    <tr>
                        <th>Nama Program :</th>
                        <td>{{ $certificate->programme_name }}</td>
                    </tr>
                    {{--<tr>--}}
                        {{--<th>No Batch :</th>--}}
                        {{--<td>{{ $certificate->batch_id }}</td>--}}
                    {{--</tr>--}}
                    <tr>
                        <th>Tahap :</th>
                        <td>{{ $certificate->level }}</td>
                    </tr>
                    <tr>
                        <th>Nama Pusat Bertauliah/Agensi :</th>
                        <td>{{ $certificate->pb_name }}</td>
                    </tr>
                    <tr>
                        <th>Negeri :</th>
                        <td>{{ $certificate->state->name }}</td>
                    </tr>
                    <tr>
                    <th>No Sijil</th>
                    <td>{{ $certificate->certificate_number }}</td>
                    </tr>
                    <tr>
                        <th>Tarikh PPL</th>
                        <td>{{ $certificate->date_ppl }}</td>
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
