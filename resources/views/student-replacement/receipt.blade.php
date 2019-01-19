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
                    <div class="panel panel-default">
                        <div class="panel-body has-padding">
                            <div class="panel panel-default">
                                <div class="panel-body">

                                <form class="form-horizontal" role="form" method="POST">
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
                        echo $IFSTATUS.'<br>';
                        echo $IUNIQID.'<br>';
                        echo $ITRXNID.'<br>';
                        echo $IMESSAGE.'<br>';
                        echo $IDATETXN.'<br>';
                        echo $IRECPTNO.'<br>';
                        echo $ORTNVR0.'<br>';
                        echo $ORTNVR1.'<br>';
                        echo $ORTNVR2.'<br>';
                        echo $ORTNVR3.'<br>';
                        echo $ORTNVR4.'<br>';
                        echo $ORTNVR5.'<br>';
                        echo $ORTNVR6.'<br>';
                        echo $ORTNVR7.'<br>';
                        echo $ORTNVR8.'<br>';
                        echo $ORTNVR9.'<br>';
                        echo $IPYMTID.'<br>';
                        echo $IORDERNO.'<br>';
                        echo $ISRCPYMT;
                        @include('partials.error_block', ['item' => 'fee'])
                    </div>
                </div>




                {{-- Submit Button --}}
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Cetak Resit
                        </button>
                    </div>
                </div>
            </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection