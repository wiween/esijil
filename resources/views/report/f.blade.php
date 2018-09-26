<style type="text/css">
    table td, table th{
        border:1px solid black;
    }

    .page-break {
        page-break-after: always;
    }
</style>

<style type="text/css">
	table.biasa, table.listing {
		border-collapse: collapse;
		border-color: #666666;
		border-width: 1px;
		color: #333333;
        font: 11px;
        text-transform: uppercase;
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
<div class="container">
    <div>
        <div>
            <strong>SESI : {{  $siries_number->session }} </strong>
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
            <br>
            Disediakan oleh Syarikat</h3>
    </div>
    <div align="left">
        <h3>Kaedah Penilaian :  @if (Request::segment(5) == 'pb')
                Pusat Bertauliah
            @elseif (Request::segment(5) == 'sldn')
                SLDN
            @elseif (Request::segment(5) == 'ndt')
                NDT
            @elseif (Request::segment(5) == 'ppt')
                PPT
            @endif
        </h3>
    </div>
    <table class="biasa">
        <tr align="center">
            <th>Bil</th>
            <th>Nama Pelatih</th>
            <th>No KP</th>
            <th>No Batch</th>
            <th>Nama Program/Kod Program</th>
            <th>Nama PB</th>
            <th>Tahap</th>
            <th>Tarikh Cetak Sijil</th>
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
                <td>{{  $certificate->batch_id }}</td>
                <td>{{  $certificate->programme_name }}<br>[{{  $certificate->programme_code }}]</td>
                <td>{{  $certificate->pb_name }}</td>
                <td>{{  $certificate->level }}</td>
                <td>{{  $certificate->date_print->format('d/m/Y') }}</td>
                <td>{{  $certificate->certificate_number }}</td>
                <td>{{  $certificate->tracking_number }}</td>
                <td>{{  $certificate->date_post->format('d/m/Y') ?? 'empty' }}</td>
                <td>{{  $certificate->receiver ?? 'empty' }}</td>
            </tr>
        @endforeach
    </table>

</div>
<script type="text/php">
    if ( isset($pdf) ) {
        $font = Font_Metrics::get_font("helvetica", "bold");
        $pdf->page_text(72, 18, "Header: {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0));
    }
</script>