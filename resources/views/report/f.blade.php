
<html>
<head>
  <style>
    @page { margin: 50px 50px; }
    header { position: fixed; top: -60px; left: 0px; right: 0px; background-color: white; height: 50px; font: 9px; }
    footer { position: fixed; bottom: -60px; left: 0px; right: 0px; background-color: white; height: 50px; font: 9px; }
    p { page-break-after: always; }
    p:last-child { page-break-after: never; }

    table.top{
		border-collapse: collapse;
		border-color: #FFFFFF;
		border-width: 1px;
        text-transform: uppercase;
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
		border-color: #666666;
		border-width: 1px;
		color: #333333;
        font: 13px;
        text-transform: uppercase;
        width: 100%
	}
	table.biasa th, table.listing th {
		background: #333;
		border-color: #262628;
		border-style: solid;
		border-width: 1px;
		color: #FDFDFF;
		font-weight: bold;
		padding: 2px;
	}
	table.biasa tr, table.listing tr {
		background-color: #FFFFFF;
	}
	table.biasa tr.even, table.listing tr.even {
		background-color: #F5F5F7;
	}
	table.biasa td, table.listing td {
		border-color: #D2D2D4;
		border-style: solid;
		border-width: 1px;
		padding: 2px;
	}
  </style>
</head>
<body>
  <main>
    <div class="container">
    <div>
        <div>
            <strong>SESI : {{ $student->session ?? 'nan' }} </strong>
        </div>
       <div align="right">
           <strong>LAMPIRAN F
               <br>JPK/CS/03(PB)</strong>
       </div>
    </div>
    <div align="center"><img src="images/jatasmall.jpg"></div>
    <div align="center">
        <h3>BORANG LAPORAN DATA PENGELUARAN SIJIL KEMAHIRAN MALAYSIA (SKM)/DIPLOMA KEMAHIRAN MALAYSIA(DKM)/DIPLOMA LANJUTAN KEMAHIRAN MALAYSIA(DLKM)
            {{--</div>--}}
            {{--<div align="center">--}}
    </div>
    
    <table class="top" width="100%">
        <tr>
            <td width="50%"><b>Kaedah Penilaian :</b>  @if ($first->type == 'pb')
                    Pusat Bertauliah
                @elseif ($first->type == 'sldn')
                    SLDN
                @elseif ($first->type == 'ndt')
                    NDT
                @elseif ($first->type == 'ppt')
                    PPT
                @endif
            </td>
            <td width="50%"><b>Kod Program :</b> {{  $first->programme_name }} - [{{  $first->programme_code }}]</td>
        </tr>
        <tr>
            <td width="50%"><b>No Batch :</b> {{$first->batch_id }} </td>
            <td width="50%"><b>Tarikh Cetak Sijil :</b> {{  $first->date_print->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td width="50%"><b>Nama PB :</b> {{$first->pb_name }} </td>
            <td width="50%">&nbsp;</td>
        </tr>
    </table>
    <br>
    <table class="biasa">
        <tr align="center">
            <th>Bil</th>
            <th>Nama Pelatih</th>
            <th>No KP</th>
            <th>Tahap</th>
            <th>No Siri Sijil</th>
            <th>No Tracking</th>
            <th>Tarikh Pos</th>
            <th>Penerima</th>
        </tr>
        @foreach($certificates as $certificate)
            <tr align="center">
                <td>{{ $loop->index + 1 }}</td>
                <td>{{  $certificate->name }}</td>
                <td>{{  $certificate->ic_number }}</td>
                <td>{{  $first->level }}</td>
                <td>{{  $certificate->certificate_number }}</td>
                <td>{{  $certificate->tracking_number }}</td>
                <td>{{  ($certificate->date_post) ? $certificate->date_post->format('d/m/Y') : 'nan' }}</td>
                <td>{{  $certificate->receiver ?? 'empty' }}</td>
            </tr>
        @endforeach
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
