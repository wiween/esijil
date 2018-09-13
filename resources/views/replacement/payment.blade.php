@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Pembayaran Penggantian Sijil :
@endsection

@section('topButton')

@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="http://mohrwallet.mohr.gov.my">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">
                        Nama Pelajar

                    </label>
                    <div class="col-md-6">
                        {{ $replacement->certificate->name }}
                        @include('partials.error_block', ['item' => 'name'])
                    </div>
                </div>

                <div class="form-group{{ $errors->has('ic_number') ? ' has-error' : '' }}">
                    <label for="ic_number" class="col-md-4 control-label">
                        No KP

                    </label>
                    <div class="col-md-6">
                        {{ $replacement->certificate->ic_number }}
                        @include('partials.error_block', ['item' => 'ic_number'])
                    </div>
                </div>

                {{-- old certificate --}}
                <div class="form-group{{ $errors->has('old_certificate_number') ? ' has-error' : '' }}">
                    <label for="old_certificate_number" class="col-md-4 control-label">
                        No Sijil Lama

                    </label>
                    <div class="col-md-6">
                        {{ $replacement->certificate->certificate_number }}
                        @include('partials.error_block', ['item' => 'old_certificate_number'])
                    </div>
                </div>

                {{-- type_replacement--}}
                <div class="form-group{{ $errors->has('type_replacement') ? ' has-error' : '' }}">
                    <label for="type_replacement" class="col-md-4 control-label">
                        Sebab Penggantian
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        {{ $replacement->type_replacement }}
                        @include('partials.error_block', ['item' => 'type_replacement'])
                    </div>
                </div>

               {{-- date_post--}}
                <div class="form-group{{ $errors->has('date_replacement') ? ' has-error' : '' }}">
                    <label for="date_replacement" class="col-md-4 control-label">
                        Tarikh Permohonan Ganti
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                       {{  $replacement->date_replacement->format('d, M Y') }}
                        @include('partials.error_block', ['item' => 'date_replacement'])
                    </div>
                </div>

                {{-- jumlah--}}
                <div class="form-group{{ $errors->has('fee') ? ' has-error' : '' }}">
                    <label for="fee" class="col-md-4 control-label">
                       Jumlah Bayaran
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                       @if ($replacement->type_replacement == 'rosak')
                            RM 20
                            <input type="text" name="RAMOUNT" value="20.00">
                        @endif
                       @if ($replacement->type_replacement == 'hilang')
                               RM 50
                               <input type="text" name="RAMOUNT" value="50.00">
                           @endif
                        @include('partials.error_block', ['item' => 'fee'])
                    </div>
                </div>

                {{-- jumlah--}}
                <div class="form-group{{ $errors->has('fee') ? ' has-error' : '' }}">
                    <label for="fee" class="col-md-4 control-label">
                        Jumlah Bayaran
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" name="RUSERNM" value="TEST2010JKKPPJBH"><BR>
                        <input type="text" name="RPASSWD" value="TEST2010JKKPPJBH"><br>
                        <input type="text" name="RACCODE" value="TEST2010JKKPPJBH"><br>
                        <input type="text" name="RRTNPGE" value="http://myhos.mohr.gov.my/mohrwallet/test3.php"><br>
                        <input type="text" name="RTXNTYP" value="FPX"><br>
                        <input type="text" name="RUNIQID" value="ABCD1236"><br>
                        <input type="text" name="OTRXNID" value="20180117014401068"><br>
                        <input type="text" name="OFLNAME" value="Ahmad bin Muhammad"><br>
                        <input type="text" name="OCURRCD" value="MYR"><br>
                        <input type="text" name="OCEMAIL" value="nornadia@mohr.gov.my"><br>
                        <input type="text" name="OCMDTYP" value="P"><br>
                        <input type="text" name="ORTNVR0" value="ABCtestabc123"><br>
                        <input type="text" name="ORTNVR1" value="ABCtestabc123"><br>
                        <input type="text" name="ORTNVR2" value="ABCtestabc123"><br>
                        <input type="text" name="ORTNVR3" value="ABCtestabc123"><br>
                        <input type="text" name="ORTNVR4" value="ABCtestabc123"><br>
                        <input type="text" name="ORTNVR5" value="ABCtestabc123"><br>
                        <input type="text" name="ORTNVR6" value="ABCtestabc123"><br>
                        <input type="text" name="ORTNVR7" value="ABCtestabc123"><br>
                        <input type="text" name="ORTNVR8" value="ABCtestabc123"><br>
                        <input type="text" name="ORTNVR9" value="ABCtestabc123"><br>
                        @include('partials.error_block', ['item' => 'fee'])
                    </div>
                </div>




                {{-- Submit Button --}}
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Mulakan Bayaran
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer_script')
@endsection
