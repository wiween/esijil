<html>
<head>
  <style>
    @page { margin: 25px 25px; }
    header { position: fixed; top: -60px; left: 0px; right: 0px; background-color: white; height: 50px; font: 9px; }
    footer { position: fixed; bottom: -60px; left: 0px; right: 0px; background-color: white; height: 50px; font: 9px; }
    p { page-break-after: always; }
    p:last-child { page-break-after: never; }

    table.top{
		border-collapse: collapse;
		border-color: #FFFFFF;
		border-width: 1px;
        text-transform: uppercase;
        width: 100%;
        font-size: 12px;
	}

	table.top tr {
		background-color: #FFFFFF;
	}
	table.top tr.even {
		background-color: #F5F5F7;
	}
	table.top td, table.listing td {
		border-color: #FFFFFF;
		border-style: solid;
		border-width: 1px;
		padding: 2px;
	}

	table.biasa, table.listing {
		border-collapse: collapse;
		border-color: #4286f4;
		border-width: 1px;
		color: #333333;
        text-transform: uppercase;
        width: 100%;
        font-size: 12px;
	}
	table.biasa th, table.listing th {
		background: #4286f4;
		border-color: #4286f4;
		border-style: solid;
		border-width: 1px;
		color: #FDFDFF;
		font-weight: bold;
		padding: 5px;
	}
	table.biasa tr, table.listing tr {
		background-color: #FFFFFF;
	}
	table.biasa tr.even, table.listing tr.even {
		background-color: #F5F5F7;
	}
	table.biasa td, table.listing td {
		border-color: #D2D2D4;
        background: #f2f7ff;
		border-style: solid;
		border-width: 1px;
		padding: 10px 5px;
	}

    table.biasa td.footer {
		border-color: #D2D2D4;
        background: #dee8f9;
		border-style: solid;
		border-width: 1px;
		padding: 10px 5px;
	}
  </style>
</head>
<body>
  <main>
    <div class="container">
        <div align="right">
            <h4>LAMPIRAN G
                <br>JPK/CS/03(PB)</h4>
        </div>
        <div align="center"><img src="images/jatasmall.jpg"></div>
        <div align="center">
            <h3>BORANG LAPORAN DATA PENGELUARAN SIJIL KEMAHIRAN MALAYSIA (SKM)/DIPLOMA KEMAHIRAN MALAYSIA(DKM)/DIPLOMA
                LANJUTAN KEMAHIRAN MALAYSIA(DLKM)
                {{--</div>--}}
                {{--<div align="center">--}}
                <br>
                Disediakan oleh Syarikat bagi tujuan tuntutan</h3>
        </div>
        <table class="biasa">
            <thead>
                <tr>
                    <th>Jenis Penilaian</th>
                    <th>Nama PB</th>
                    <th>Batch No</th>
                    <th>Sesi</th>
                    <th>Bilangan Sijil</th>
                    <th>Jumlah perlu dibayar (rm)</th>
                </tr>          
            </thead>
            <tbody>
                {{ $subtotal = 0 }}
                @foreach($certificates as $cert)
                <tr>
                    <td>
                        @if ($cert->type == 'pb')
                            Pusat Bertauliah
                        @elseif ($cert->type == 'sldn')
                            SLDN
                        @elseif ($cert->type == 'ndt')
                            NDT
                        @elseif ($cert->type == 'ppt')
                            PPT
                        @endif
                    </td>
                    <td>{{  $cert->pb_name }}</td>
                    <td>{{  $cert->batch_id }}</td>
                    <td>{{  $cert->session }}</td>
                    <td>{{  $a = \App\Certificate::where('batch_id', $cert->batch_id)->where('flag_printed', 'Y')->orderBy('name', 'asc')
                            ->where('source', 'syarikat')->where('type',$cert->type)->count() }}
                    </td>
                    <td style="text-align: right;">{{ $total = $a * 2.80 }}</td>
                </tr>
                {{ $subtotal += $total }}
                @endforeach
                <tr>
                    <td class="footer" style="text-align: right;" colspan="5">Jumlah Keseluruhan (RM)</td>
                    <td class="footer" style="text-align: right;">{{ $subtotal }}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <br>
        <table class="top">
            <tr>
                <td style="width:33%;">
                    <table class="top">
                        <tr>
                            <td>Tandatangan&nbsp;Wakil&nbsp;KSM</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><hr></td>
                        </tr>
                        <tr>
                            <td>NAMA : </td>
                        </tr>
                        <tr>
                            <td>NO KP : </td>
                        </tr>
                        <tr>
                            <td>TARIKH : </td>
                        </tr>
                        <tr>
                            <td>COP: </td>
                        </tr>
                    </table>
                </td>
                <td style="width:34%;">&nbsp;</td>
                <td style="width:33%;"><table class="top">
                        <tr>
                            <td>Tandatangan&nbsp;Wakil&nbsp;Pencetak</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><hr></td>
                        </tr>
                        <tr>
                            <td>NAMA : </td>
                        </tr>
                        <tr>
                            <td>NO KP : </td>
                        </tr>
                        <tr>
                            <td>TARIKH : </td>
                        </tr>
                        <tr>
                            <td>COP: </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
  </main>
  <script type="text/php">
    if ( isset($pdf) ) {
        $font = Font_Metrics::get_font("helvetica", "bold");
        $pdf->page_text(72, 18, "Header: {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0));
    }
</script>
</body>
</html>
