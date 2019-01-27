@include('print.layout.header')

@php
    $sijil = 'single_certificate';

    if ($certificate->level == 'PC') {
        $sijil = 'certificate';
    }

    if ($certificate->level == 'TAHAP EMPAT' || $certificate->level == 'TAHAP LIMA') {
        $sijil = 'certificate45';
    }

    if ($certificate->level == 'TAHAP SATU' || $certificate->level == 'TAHAP DUA' || $certificate->level == 'TAHAP TIGA' && $certificate->type == 'ndt') {
        $sijil = 'certificatendt';
    } else {
        $sijil = 'certificate13';
    }
@endphp

@include('print.' . $sijil)

@include('print.layout.footer')
