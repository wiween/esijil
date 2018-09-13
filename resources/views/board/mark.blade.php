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
                    <tr class="bg-primary">
                        <th>Markah :</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>
                           <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Subjek</th>
                                    <th>P1</th>
                                    <th>P2</th>
                                    <th>P3</th>
                                    <th>P4</th>
                                    <th>P5</th>
                                </tr>
                                <tr>
                                    <td>Markah</td>
                                    <td>99</td>
                                    <td>80</td>
                                    <td>66</td>
                                    <td>66</td>
                                    <td>45</td>
                                </tr>
                            </table>

                        </th>
                        <td></td>
                    </tr>
                </table>
                <br>
                <a href="/board/show/{{ $espkm->id }}" class="btn btn-primary btn-block">Kembali</a>

            </div>
        </div>
    </div>
@endsection

@section('footer_script')
@endsection