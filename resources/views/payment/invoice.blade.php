<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>

    <style>
    @media print {
    .printPageButton {
        display: none;
    }
    }
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>
<body onunload="myUnloadEvent()">
    {{-- print_r(json_encode(request()->all())) --}}

    

    <div class="invoice-box">
        <table>
            <tr>
                <td width="1px">
                <img src="{{ asset('images/jatasmall.jpg')}}"><br>
                </td>
                
                <td style="text-align: left">
                    <b>Jabatan Pembangunan Kemahiran</b><br>
                    Tingkat 7 - 8, Blok D4, Kompleks D,<br>
                    Pusat Pentadbiran Kerajaan Persekutuan,<br>
                    62530 Putrajaya.
                </td>
            </tr>
        </table>
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Transaksi #: {{ $paymentGatewayResponse['ITRXNID'] }}<br>
                                No. Batch: {{ $replacement->certificate->batch_id }}<br>
                                Kod Program: {{ $replacement->certificate->programme_code }}<br>
                                Nama Program: {{ $replacement->certificate->programme_name }}
                            </td>
                            
                            <td>
                                Resit #: {{ $paymentGatewayResponse['IRECPTNO']}}<br>
                                Tarikh: {{ \Carbon\Carbon::createFromFormat('d/m/Y H:i:s', $paymentGatewayResponse['IDATETXN'])->format('d-m-Y g:i A')}}<br>                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
                        
            <tr class="heading">
                <td>
                    Item
                </td>
                
                <td>
                    Jumlah
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    Pengantian<br>
                    ({{ ucfirst($replacement->type_replacement) }})
                </td>
                
                <td>
                    RM{{ ($replacement->type_replacement == 'hilang') ? "50.00" : "20.00" }}
                </td>
            </tr>
                        
            <tr class="total">
                <td></td>
                
                <td>
                   Total: RM{{ ($replacement->type_replacement == 'hilang') ? "50.00" : "20.00" }}
                </td>
            </tr>
        </table>
    </div>
    <button class="printPageButton" onclick="tutup()">Tutup</button>
    <button class="printPageButton" onclick="cetak()">Cetak Resit</button>


    <script>
        var resp = JSON.parse('{!! json_encode(request()->all()) !!}');

        function myUnloadEvent() {
            if (resp.IFSTATUS == 'Y') {
                window.opener.location.href = '{{ url(""). "/replacement" }}' ;
            }

            return;
        }

        window.onbeforeunload = function(){ myUnloadEvent(); }

        function cetak() {
            window.print();
        }

        function tutup() {
            window.close();
        }

    </script>
</body>

</html>