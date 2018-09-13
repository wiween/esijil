<style type="text/css">
    table td, table th{
        border:1px solid black;
    }

    .page-break {
        page-break-after: always;
    }
</style>
<div class="container">
    <div>
        <strong>SESI : {{  $siries_number->session }} </strong>
    </div>
    <div align="right">
        <h4>LAMPIRAN G
            <br>JPK/CS/03(PB)</h4>
    </div>
    <div align="center">
        <h3>BORANG LAPORAN DATA PENGELUARAN SIJIL KEMAHIRAN MALAYSIA (SKM)/DIPLOMA KEMAHIRAN MALAYSIA(DKM)/DIPLOMA LANJUTAN KEMAHIRAN MALAYSIA(DLKM)
            {{--</div>--}}
            {{--<div align="center">--}}
            <br>
            Disediakan oleh Syarikat bagi tujuan tuntutan</h3>
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
    <table class="table table-bordered">
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
                {{--<td>{{  $certificate->post->tracking_number}}</td>--}}
                {{--<td>{{  $certificate->post->post_date->format('d/m/Y') }}</td>--}}
                {{--<td>{{  $certificate->post->receiver }}</td>--}}
                {{--<td>{{  $certificate->result_ppl }}</td>--}}
                {{--<td>{{  $certificate->result_ppl }}</td>--}}
                {{--<td>{{  $certificate->result_ppl }}</td>--}}
            </tr>
        @endforeach
    </table>
    <br><br>
    <div align="center" class="footer">
    @if ($finances->finance_remark == 'Y')
            <h4>Siri ini telah disahkan oleh pegawai</h4>
        @else
            <strong>Siri ini BELUM disahakan</strong>
        @endif
    </div>
    <div>

    </div>
</div>