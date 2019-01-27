<main>
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
                    <h2 align="center">{{ strtoupper($certificate->level) }}</h2>
                    <br/>
                    <br/>
                    <br/>
                    <h2 align="center">{{ strtoupper($certificate->name) }}</h2>
                    <h2 align="center">{{  strtoupper($certificate->ic_number) }}</h2>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <h2 align="center">PENILAIAN TELAH DILAKSANAKAN DI PUSAT BERTAULIAH</h2>
                    <h2 align="center">{{  strtoupper($certificate->pb_name) }}</h2>
                    <h2 align="center">{{  strtoupper($certificate->state->name) }}</h2>
                </div>
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
            </td>
        </tr>
    </table>

    <div class="information" style="position: absolute; bottom: 0;">
        <table width="100%">
            <tr>
                <td align="left" style="width: 50%; height: 150px; vertical-align: top; padding-left: 100px; ">
                <h5>
                    {{ strtoupper($certificate->batch_id) }}
                    <br>
                    {{ strtoupper(optional($certificate->date_print)->format('d/m/Y')) }}
                    <br>
                    {{ strtoupper($certificate->printed_remark) }}
                </h5>
                </td>
            </tr>
        </table>
    </div>        
</main>
