<style type="text/css">
    table td, table th{
        border:1px solid black;
    }

    .page-break {
        page-break-after: always;
    }
</style>
<div class="container">
    @foreach($certificates as $certificate)
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <div class="center">
            <h2 align="center">{{  $certificate->result_ppl }}</h2>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <h2 align="center">{{ $certificate->name }}</h2>
            <br/>
            <h2 align="center">( {{  $certificate->ic_number }} )</h2>
            <div class="page-break"></div>

        </div>
    @endforeach
</div>