@extends('layouts.frontend')

@section('header_script')
@endsection

@section('mainTitle')
    Download Data Pelajar
@endsection

@section('topButton')

@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">

            @if($message = Session::get('success'))
    <div class="alert alert-info alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <strong>Success!</strong> {{ $message }}
    </div>
@endif
{!! Session::forget('success') !!}
<br />
<a href="{{ URL::to('downloadExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
<a href="{{ URL::to('downloadExcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
<a href="{{ URL::to('downloadExcel/csv') }}"><button class="btn btn-success">Download CSV</button></a>
<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="file" name="import_file" />
    <button class="btn btn-primary">Import File</button>
</form>

        </div>
    </div>
    </div>
@endsection

@section('footer_script')
@endsection
