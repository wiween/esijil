@extends('layouts.basic')

@section('content')

<form id="checkout" method="POST" action="{{ $url }}">
    <input type="hidden" name="RAMOUNT" value="{{ $data['RAMOUNT'] }}">
    <input type="hidden" name="RUSERNM" value="{{ $data['RUSERNM'] }}">
    <input type="hidden" name="RPASSWD" value="{{ $data['RPASSWD'] }}">
    <input type="hidden" name="RACCODE" value="{{ $data['RACCODE'] }}">
    <input type="hidden" name="RRTNPGE" value="{{ $data['RRTNPGE'] }}">
    <input type="hidden" name="RTXNTYP" value="{{ $data['RTXNTYP'] }}">
    <input type="hidden" name="RUNIQID" value="{{ $data['RUNIQID'] }}">
    <input type="hidden" name="OTRXNID" value="{{ $data['OTRXNID'] }}">
    <input type="hidden" name="OFLNAME" value='{{ $data['OFLNAME'] }}'>
    <input type="hidden" name="OCURRCD" value="{{ $data['OCURRCD'] }}">
    <input type="hidden" name="OCEMAIL" value="{{ $data['OCEMAIL'] }}">
    <input type="hidden" name="OCMDTYP" value="{{ $data['OCMDTYP'] }}">
    <input type="hidden" name="ORTNVR0" value="{{ $data['ORTNVR0'] }}">
    <input type="hidden" name="ORTNVR1" value="{{ $data['ORTNVR1'] }}">
    <input type="hidden" name="ORTNVR2" value="{{ $data['ORTNVR2'] }}">
    <input type="hidden" name="ORTNVR3" value="{{ $data['ORTNVR3'] }}">
</form>

@endsection

@section('footer_script')
<script>
    $(document).ready(function() {
        $(document).ready(function(){
     $("#checkout").submit();
});
    });
</script>
@endsection