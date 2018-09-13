<style type="text/css">
    table td, table th{
        border:1px solid black;
    }

    .page-break {
        page-break-after: always;
    }
</style>
<div class="container">
    <div align="right">
        <h4>LAMPIRAN F2
            <br>JPK/CS/03(PPT)</h4>
    </div>
    <div align="center">
        <h3>BORANG LAPORAN DATA PENGELUARAN SIJIL KEMAHIRAN MALAYSIA (SKM)/DIPLOMA KEMAHIRAN MALAYSIA(DKM)/DIPLOMA LANJUTAN KEMAHIRAN MALAYSIA(DLKM)
            {{--</div>--}}
            {{--<div align="center">--}}
            <br>
            Disediakan oleh Syarikat</h3>
    </div>
    <div align="left">
        <h3>Kaedah Penilaian : Pengiktirafan Pencapaian Terdahulu (PPT)</h3>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>Bil</th>
            <th>Nama Pelatih</th>
            <th>No ID</th>
            <th>No Kumpulan Pelatih</th>
            <th>Nama Program</th>
            <th>Kod Program</th>
            {{--<th>Tahap</th>--}}
            {{--<th>Nama PB</th>--}}
            <th>Negeri</th>
            {{--<th>Tarikh PPL</th>--}}
            <th>Tarikh Cetak Sijil</th>
            <th>No Siri Sijil</th>
            <th>No Tracking</th>
            <th>Tarikh Pos</th>
            <th>Penerima</th>
        </tr>
        @foreach($certificates as $certificate)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{  $certificate->name }}</td>
                <td>{{  $certificate->ic_number }}</td>
                <td>{{  $certificate->batch_id }}</td>
                <td>{{  $certificate->programme_name }}</td>
                <td>{{  $certificate->programme_code }}</td>
                {{--<td>{{  $certificate->pb_name }}</td>--}}
                <td>{{  $certificate->state->name }}</td>
                <td>{{  $certificate->date_print}}</td>
                <td>{{  $certificate->certificate_number }}</td>
                <td>{{  $certificate->tracking_number}}</td>
                <td>{{  $certificate->post_date }}</td>
                <td>{{  $certificate->receiver }}</td>
                {{--<td>{{  $certificate->result_ppl }}</td>--}}
                {{--<td>{{  $certificate->result_ppl }}</td>--}}
                {{--<td>{{  $certificate->result_ppl }}</td>--}}
            </tr>
        @endforeach
    </table>
</div>