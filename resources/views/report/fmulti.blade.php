
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
    .page-break {
        page-break-after: always;
    }
  </style>
</head>
<body>
    <script type="text/php">
    if ( isset($pdf) ) {
        $font = Font_Metrics::get_font("helvetica", "bold");
        $pdf->page_text(72, 18, "Header: {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0));
    }
</script> 
  <main>
    @foreach($batches as $batch)
    <?php 
        $batch = explode('|', $batch);
        $students = $certificates->filter(function($certificate, $key) use ($batch) {
        return $certificate->batch_id === $batch[0];
        });

        $student = $students->first();
    ?>

    @if ($loop->iteration > 1)
        <div class="page-break"></div>
    @endif

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
                <td width="50%"><b>Kaedah Penilaian :</b>  @if ($student->type == 'pb')
                        Pusat Bertauliah
                    @elseif ($student->type == 'sldn')
                        SLDN
                    @elseif ($student->type == 'ndt')
                        NDT
                    @elseif ($student->type == 'ppt')
                        PPT
                    @endif
                </td>
                <td width="50%"><b>Kod Program :</b> {{  $student->programme_name }} - [{{  $student->programme_code }}]</td>
            </tr>
            <tr>
                <td width="50%"><b>No Batch :</b> {{$student->batch_id }} </td>
                <td width="50%"><b>Tarikh Cetak Sijil :</b> {{  optional($student->date_print)->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <td width="50%"><b>Nama PB :</b> {{$student->pb_name }} </td>
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
            @foreach($students as $student)
                <tr align="center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{  $student->name }}</td>
                    <td>{{  $student->ic_number }}</td>
                    <td>{{  $student->level }}</td>
                    <td>{{  $student->certificate_number }}</td>
                    <td>{{  $student->tracking_number }}</td>
                    <td>{{  optional($student->date_post)->format('d/m/Y') ?? 'nan' }}</td>
                    <td>{{  $student->receiver ?? 'empty' }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    @endforeach
  </main>
</body>
</html>
