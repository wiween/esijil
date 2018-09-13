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
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
         <div class="center">
            <h2 align="center">{{ strtoupper($certificate->programme_name) }}</h2>
        </div>
        <br/>
        <br/>
        <div class="center">
            <h2 align="center">{{ strtoupper($certificate->name) }}</h2>
            <h2 align="center">( {{  $certificate->ic_number }} )</h2>
        </div>
        <br/>
        <br/>
        <div class="center">
            <h2 align="center">PENILAIAN TELAH DILAKSANAKAN DI PUSAT BERTAULIAH <BR></h2>
            <h2 align="center">{{  strtoupper($certificate->pb_name) }}</h2>
        </div>
        <br/>
        <br/>
        <div>
            <h5 align="center">{{  strtoupper($certificate->batch_id }}</h5>
            <h5 align="center">{{  strtoupper($certificate->date_print->format('d/m/Y')) }}</h5>
        </div>

    @endforeach
</div>