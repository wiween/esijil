<html>
<head>
    <style>
        @page { margin: 0px 70px; }
        header { position: fixed; top: -60px; left: 0px; right: 0px; background-color: white; height: 50px; font-size: 9px; }
        footer { position: fixed; bottom: 0px; left: 40px; left: 60px; background-color: white; height: 50px; font-size: 17px; }
        p { page-break-after: always; }
        p:last-child { page-break-after: never; }

        .page-break {
            page-break-after: always;
        }

        .text-sijil {
            font-family: "Arial", Times, serif;
            font-size: 40px;
        }
    </style>
</head>
<body>
<script type="text/php">
if ( isset($pdf) ) {
        $font = Font_Metrics::get_font("helvetica", "bold");
        {{--$pdf->page_text(72, 18, "Header: {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0));--}}
    }
</script>
<main>
    @foreach($certificates as $certificate)
        <table width="100%">
            <tr><td>
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
                <h2 align="center">{{ $certificate->name }}</h2>
                <h2 align="center">{{  $certificate->ic_number }}</h2>
        <br/>
        <br/>
        <h2 align="center">PENILAIAN TELAH DILAKSANAKAN DI PUSAT BERTAULIAH</h2>
        <h2 align="center">{{  $certificate->pb_name }}</h2>
        <h2 align="center">{{  $certificate->state->name }}</h2>
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

        </td></tr>
        </table>

        <div class="information" style="position: absolute; bottom: 0;">
            <table width="100%">
                <tr>
                    <td align="left" style="width: 50%; height: 150px; vertical-align: top; padding-left: 100px; ">
                    <h5>
                        {{ $certificate->programme_code }}
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
    </main>
        </body>
        </html>
