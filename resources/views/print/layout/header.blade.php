<html>
    <head>
        <style>
            @page { margin: 0px 70px; }
            header { position: fixed; top: -60px; left: 0px; right: 0px; background-color: white; height: 50px; font-size: 9px; }
            h2 {
                font-size: 14px;
            }
            h3 {
                font-size: 12px;
            }

            h5 {
                font-size: 10px;
            }
            .footer-sijil {
                position: fixed; bottom: 0px; left: 40px;
                font-size: 10px;
            }
            p { page-break-after: always; }
            p:last-child { page-break-after: never; }

            .page-break {
                page-break-after: always;
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