<style type="text/css">
    table td, table th {
        border: 1px solid black;
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
        <h3>BORANG LAPORAN DATA PENGELUARAN SIJIL KEMAHIRAN MALAYSIA (SKM)/DIPLOMA KEMAHIRAN MALAYSIA(DKM)/DIPLOMA
            LANJUTAN KEMAHIRAN MALAYSIA(DLKM)
            {{--</div>--}}
            {{--<div align="center">--}}
            <br>
            Disediakan oleh Syarikat bagi tujuan tuntutan</h3>
    </div>
    <div align="left">
        <h3>Kaedah Penilaian : @if (Request::segment(4) == 'pb')
                Pusat Bertauliah
            @elseif (Request::segment(4) == 'sldn')
                SLDN
            @elseif (Request::segment(4) == 'ndt')
                NDT
            @elseif (Request::segment(4) == 'ppt')
                PPT
            @endif
        </h3>
    </div>
   <div>
       Belum Disahkan Lagi Oleh Pegawai
   </div>

    <div>
    </div>
</div>