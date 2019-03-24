<main>
    <table width="100%">
        <tr><td>
            <br/>
            <div class="center">
                <h2 align="center">{{ strtoupper($certificate->programme_name) }}</h2>
            </div>
            <br/>
            <br/>
            <br/>
            <div class="center">
                <h2 align="center">{{ strtoupper($certificate->name) }}</h2>
                <h2 align="center">{{  $certificate->ic_number }}</h2>
            </div>
            <br/>
                <br/>
                <br/>
                <br/>
                <div class="center">
                <h3 align="center">PENILAIAN TELAH DILAKSANAKAN DI PUSAT BERTAULIAH <BR></h3>
                <h3 align="center">{{  strtoupper($certificate->pb_name) }}</h3>
            </div>
            <br/>
            <br/>
            <br/>
                <br/>

        </td></tr>
    </table>

    <div class="information" style="position: absolute; bottom: 0;">
        <table width="100%">
            <tr>
                <td align="left" style="width: 50%; height: 150px; vertical-align: top; padding-left: 100px; ">
                <h5>
                    {{ strtoupper($certificate->batch_id) }}-{{ $certificate->date_ppl }}
                    <br>
                    {{ strtoupper($certificate->date_print->format('d/m/Y')) }}
                    <br>
                </h5>
                </td>
            </tr>
        </table>
    </div>        
</main>
