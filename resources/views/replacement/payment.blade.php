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
            <form id="frmcheckout" class="form-horizontal" role="form" method="POST"
        {{-- action="http://mohrwallet.mohr.gov.my/vip/vip.aspx" --}}
        action="{{ url('epayment/replacement/'.$replacement->id .'/paying') }}" > {{-- epayment/replacementchargeprocess/ --}}
            
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
                        {{ $replacement->old_certificate_number }}
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
                @if ($replacement->type_replacement <> 'Kesilapan JPK')
                {{-- jumlah--}}
                <div class="form-group{{ $errors->has('fee') ? ' has-error' : '' }}">
                    <label for="fee" class="col-md-4 control-label">
                       Jumlah Bayaran
                        <span class="text-danger"> * </span>
                    </label>
                    <div class="col-md-6">
                       @if ($replacement->type_replacement == 'rosak')
                            RM 20
                        @endif
                       @if ($replacement->type_replacement == 'hilang')
                               RM 50
                           @endif
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
                    @endif
            </form>
        </div>
    </div>
@endsection

@section('footer_script')
<script>
    $(document).ready(function() {
        $('#frmcheckout').on('submit', function(e) {
            parentW=window.open('', 'formpopup', 'width=750,height=700,resizeable,scrollbars');
            this.target = 'formpopup';
        });
    });
</script>
@endsection
