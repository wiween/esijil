@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Maklumat Terperinci : {{ $certificate->name }}
@endsection

@section('topButton')
    {{--<a href="/admin/certificate" class="btn btn-link btn-float has-text">--}}
    {{--<i class="icon-list-numbered text-primary"></i>--}}
    {{--<span>All Activities</span>--}}
    {{--</a>--}}
    {{--<a href="/admin/certificate/edit/{{ $certificate->id }}" class="btn btn-link btn-float has-text">--}}
    {{--<i class="icon-pencil text-primary"></i>--}}
    {{--<span>Edit</span>--}}
    {{--</a>--}}
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            {{--<div class="col-md-6">--}}
            {{-- PHOTO HERE--}}
            {{--<img src="{{ $certificate->image }}" class="img img-thumbnail img-responsive">--}}
            {{--</div>--}}
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
                    {{--<tr>--}}
                    {{--<th>No Kumpulan :</th>--}}
                    {{--<td>{{ $certificate->training_group_number }}</td>--}}
                    {{--</tr>--}}
                    <tr>
                        <th>Kod Program :</th>
                        <td>{{ $certificate->programme_code }}</td>
                    </tr>
                    <tr>
                        <th>Nama Program :</th>
                        <td>{{ $certificate->programme_name }}</td>
                    </tr>
                    <tr>
                        <th>Batch No :</th>
                        <td>{{ $certificate->batch_id }}</td>
                    </tr>
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
                    {{--<tr>--}}
                    {{--<th>Keputusan PPL</th>--}}
                    {{--<td>{{ $certificate->result_ppl }}</td>--}}
                    {{--</tr>--}}
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $certificate->address }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td class="text-capitalize">
                            @if ($certificate->status == 'Published')
                                <span class="label label-success">{{ $certificate->status }}</span>
                            @elseif($certificate->status == 'Unpublished')
                                <span class="label label-warning">{{ $certificate->status }}</span>
                            @else
                                <span class="label label-default">{{ $certificate->status }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Flag Sudah Dicetak</th>
                        <td>{{ $certificate->flag_printed }}</td>
                    </tr>
                    <tr>
                        <th>No Sijil</th>
                        <td>{{ $certificate->certificate_number }}</td>
                    </tr>
                    <tr>
                    <th colspan="2"  align="center">MAKLUMAT PENGGANTIAN</th>
                    </tr>

                    <tr>
                    <th>Jenis Penggantian</th>
                    <td>{{ $replacement->type_replacement }}</td>
                    </tr>
                    <tr>
                    <th>Sebab Permohonan</th>
                    <td>
                    {{ $replacement->reason }}
                    </td>
                    </tr>
                    {{--<tr>--}}
                    {{--<th>Updated At</th>--}}
                    {{--<td>--}}
                    {{--{{ $certificate->updated_at->format('d M, Y') }}--}}
                    {{--</td>--}}
                    </tr>
                </table>
                <br>
                <a href="{{ url('') }}/replacement/{{ $certificate->id }}/edit" class="btn btn-primary btn-block">Kemaskini Rekod</a>
                <a href="{{ url('') }}/replacement/flag/Y/{{ $replacement->id }}" class="btn btn-success btn-block">Sahkan Rekod</a>
                <a href="{{ url('') }}/replacement/flag/N/{{ $replacement->id }}" class="btn btn-danger btn-block">Batalkan Rekod</a>

            </div>
        </div>
    </div>
@endsection

@section('footer_script')
@endsection