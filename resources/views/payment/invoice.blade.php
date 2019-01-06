<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
</head>
<body onunload="myUnloadEvent()">
    {{ print_r(json_encode(request()->all())) }}
</body>
<script>
    var resp = JSON.parse('{!! json_encode(request()->all()) !!}');

    function myUnloadEvent() {
        if (resp.IFSTATUS == 'Y') {
            window.opener.location.href = '{{ url(""). "/replacement" }}' ;
        }

        return;
    }

    window.onbeforeunload = function(){ myUnloadEvent(); }

</script>
</html>