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
        <table width="100%">
            <tr>
                <td>
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
                </td>
            </tr>
        </table>

        <div class="information" style="position: absolute; bottom: 0;">
            <table width="100%">
                <tr>
                    <td align="left" style="width: 50%; height: 150px; vertical-align: top; padding-left: 100px; ">
                    <h5>
                        {{ strtoupper($certificate->batch_id) }}  - {{ strtoupper($certificate->tarikh_ppl) }}
                        <br>
                        {{ strtoupper($certificate->date_print->format('d/m/Y')) }}
                       </h5>
                    </td>
                </tr>
            </table>
        </div>
        
        @if (! $loop->last)
            <div class="page-break"></div>
        @endif
    @endforeach
</div>