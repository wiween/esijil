@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Maklumat Terperinci : {{ $espkm->name }}
@endsection

@section('topButton')
    {{--<a href="/admin/certificate" class="btn btn-link btn-float has-text">--}}
    {{--<i class="icon-list-numbered text-primary"></i>--}}
    {{--<span>All Activities</span>--}}
    {{--</a>--}}
    {{--<a href="/admin/certificate/edit/{{ $espkm->id }}" class="btn btn-link btn-float has-text">--}}
    {{--<i class="icon-pencil text-primary"></i>--}}
    {{--<span>Edit</span>--}}
    {{--</a>--}}
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            {{--<div class="col-md-6">--}}
            {{-- PHOTO HERE--}}
            {{--<img src="{{ $espkm->image }}" class="img img-thumbnail img-responsive">--}}
            {{--</div>--}}
            <div class="col-md-12">
                {{-- TABLE HERE --}}
                <table class="table table-striped">
                    <tr>
                        <th class=" col-md-5">No KP :</th>
                        <td>{{ $espkm->ic_number }}</td>
                    </tr>
                    <tr>
                        <th class=" col-md-5">Name :</th>
                        <td>{{ $espkm->name }}</td>
                    </tr>
                    <tr>
                        <th>No Batch :</th>
                        <td>{{ $espkm->batch_id }}</td>
                    </tr>
                    <tr>
                        <th class=" col-md-5">Markah :</th>
                        <td><a href="/board/mark/{{ $espkm->ic_number }}/{{ $espkm->batch_id  }}" target="_new">Markah Keseluruhan</a></td>
                    </tr>
                    {{--<tr>--}}
                        {{--<th>No Kumpulan :</th>--}}
                        {{--<td>{{ $espkm->training_group_number }}</td>--}}
                    {{--</tr>--}}
                    <tr>
                        <th>Kod Program :</th>
                        <td>{{ $espkm->programme_code }}</td>
                    </tr>
                    <tr>
                        <th>Nama Program :</th>
                        <td>{{ $espkm->programme_name }}</td>
                    </tr>
                    <tr>
                        <th>Tahap :</th>
                        <td>{{ $espkm->level }}</td>
                    </tr>
                    <tr>
                        <th>Nama Pusat Bertauliah/Agensi :</th>
                        <td>{{ $espkm->pb_name }}</td>
                    </tr>
                    <tr>
                        <th>Negeri :</th>
                        <td>{{ $espkm->state->name }}</td>
                    </tr>
                    <tr>
                        <th>Tarikh PPL</th>
                        <td>{{ $espkm->date_ppl->format('d M, Y') }}</td>
                    </tr>

                    <tr>
                        <th>Keputusan PPL</th>
                        <td>{{ $espkm->result_ppl }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{ $espkm->address }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td class="text-capitalize">
                            @if ($espkm->status == 'Published')
                                <span class="label label-success">{{ $espkm->status }}</span>
                            @elseif($espkm->status == 'Unpublished')
                                <span class="label label-warning">{{ $espkm->status }}</span>
                            @else
                                <span class="label label-default">{{ $espkm->status }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="table-danger">
                        <th>Pengesahan Jawatan Kuasa</th>
                        <td>{{ $espkm->flag_boarded }}</td>
                    </tr>
                    <tr class="table-danger">
                        <th>Sebab Penolakan atau KIV</th>
                        <td class="table-danger">{{ $espkm->reason }}</td>
                    </tr>
                    <tr>
                        <th>Remark</th>
                        <td>{{ $espkm->remark }}</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>
                            {{ $espkm->created_at->format('d M, Y') }}
                        </td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>
                            {{ $espkm->updated_at->format('d M, Y') }}
                        </td>
                    </tr>
                </table>
                <br>
                <a href="/board/edit/{{ $espkm->id }}" class="btn btn-primary btn-block">Kemaskini Rekod</a>

            </div>
        </div>
    </div>
@endsection

@section('footer_script')
@endsection