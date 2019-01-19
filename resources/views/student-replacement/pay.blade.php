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
                            <div class="panel panel-default has-padding">
                                <div class="panel-body has-padding">
                                    {{--error message-- nape tak kuar ? wan tlg }}--}}
                                   @if (Session::has('successMessage'))
                                        <div class="alert alert-success alert-styled-left alert-bordered">
                                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                                            <strong>Success</strong> {{ session('successMessage') }}
                                        </div>
                                    @endif

                                    @if (Session::has('errorMessage'))
                                        <div class="alert alert-danger alert-styled-left alert-bordered">
                                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                                            <strong>Error!</strong> {{ session('errorMessage') }}
                                        </div>
                                    @endif
                                    <form id="frmcheckout" class="form-horizontal" role="form" method="POST"
                                          {{-- action="http://mohrwallet.mohr.gov.my/vip/vip.aspx" --}}
                                          action="{{ url('epayment/ganti/'.$replacement->id .'/paying') }}"> {{-- epayment/replacementchargeprocess/ --}}

                                        {{ csrf_field() }}
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label">
                                                Nama Pelajar :

                                            </label>
                                               {{ $replacement->certificate->name }}
                                                @include('partials.error_block', ['item' => 'name'])

                                        </div>

                                        <div class="form-group{{ $errors->has('ic_number') ? ' has-error' : '' }}">
                                            <label for="ic_number" class="col-md-4 control-label">
                                                No KP :

                                            </label>
                                                {{ $replacement->certificate->ic_number }}
                                                @include('partials.error_block', ['item' => 'ic_number'])
                                          </div>

                                        {{-- old certificate --}}
                                        <div class="form-group{{ $errors->has('old_certificate_number') ? ' has-error' : '' }}">
                                            <label for="old_certificate_number" class="col-md-4 control-label">
                                                No Sijil Lama :

                                            </label>
                                                {{ $replacement->old_certificate_number }}
                                                @include('partials.error_block', ['item' => 'old_certificate_number'])
                                          </div>

                                        {{-- type_replacement--}}
                                        <div class="form-group{{ $errors->has('type_replacement') ? ' has-error' : '' }}">
                                            <label for="type_replacement" class="col-md-4 control-label">
                                                Sebab Penggantian
                                                <span class="text-danger"> * </span>
                                            </label>
                                                {{ $replacement->type_replacement }}
                                                @include('partials.error_block', ['item' => 'type_replacement'])
                                          </div>

                                        {{-- date_post--}}
                                        <div class="form-group{{ $errors->has('date_replacement') ? ' has-error' : '' }}">
                                            <label for="date_replacement" class="col-md-4 control-label">
                                                Tarikh Permohonan Ganti :
                                                <span class="text-danger"> * </span>
                                            </label>
                                        {{  $replacement->date_replacement->format('d, M Y') }}
                                                @include('partials.error_block', ['item' => 'date_replacement'])

                                        </div>
                                        @if ($replacement->type_replacement <> 'Kesilapan JPK')
                                        {{-- jumlah--}}
                                        <div class="form-group{{ $errors->has('fee') ? ' has-error' : '' }}">
                                            <label for="fee" class="col-md-4 control-label">
                                                Jumlah Bayaran :
                                                <span class="text-danger"> * </span>
                                            </label>

                                                @if ($replacement->type_replacement == 'rosak')
                                                    RM 20
                                                @endif
                                                @if ($replacement->type_replacement == 'hilang')
                                                    RM 50
                                                @endif
                                                @include('partials.error_block', ['item' => 'fee'])

                                        </div>

                                        {{-- Submit Button --}}
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Mulakan Bayaran
                                                </button>
                                            </div>
                                        </div>
                                            @endif
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--yg ni tak nak popup - tlg wan--}}
    <script>
        $(document).ready(function() {
            $('#frmcheckout').on('submit', function(e) {
                parentW=window.open('', 'formpopup', 'width=750,height=700,resizeable,scrollbars');
                this.target = 'formpopup';
            });
        });
    </script>
    @endsection
