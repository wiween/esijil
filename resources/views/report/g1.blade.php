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
    <div align="center"><img src="images/jatasmall.jpg"></div>
    <div align="center">
        <h3>BORANG LAPORAN DATA PENGELUARAN SIJIL KEMAHIRAN MALAYSIA (SKM)/DIPLOMA KEMAHIRAN MALAYSIA(DKM)/DIPLOMA
            LANJUTAN KEMAHIRAN MALAYSIA(DLKM)
            {{--</div>--}}
            {{--<div align="center">--}}
            <br>
            Disediakan oleh Syarikat bagi tujuan tuntutan</h3>
    </div>
    <div align="left">
        <h3>Kaedah Penilaian : @if (Request::segment(5) == 'pb')
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
    <hr>
    <div class="row">
        <div class="form-group">
        <div class="col-md-6">
            <h4>1. Nama PB : {{  $certificates->pb_name }}</h4>
        </div>
        <div class="col-md-3">
            <h4>2. No Batch : {{  $certificates->batch_id }}</h4>
        </div>
        </div>
        <div>
            <h4> 3. Bilangan Sijil : {{  $a = \App\Certificate::where('batch_id', $certificates->batch_id)->where('flag_printed', 'Y')->orderBy('name', 'asc')
            ->where('source', 'syarikat')->where('type',$certificates->type)->count() }}</h4>
        </div>
        {{--<div>--}}
            {{--<h4> 4. Harga Per Sijil (RM) : 2.80</h4>--}}
        {{--</div>--}}
        <hr>
        <div>
            <h4>Jumlah Bayaran (RM) : {{ $a }} x 2.80 = {{ $total = $a * 2.80 }}</h4>
        </div>
    </div>
    <br>
    <div align="center" class="footer">
        <strong>Siri ini BELUM disahkan lagi oleh kewangan KSM</strong>
    </div>
    <div>

    </div>
</div>