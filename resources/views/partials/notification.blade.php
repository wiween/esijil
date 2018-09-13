@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::has('successMessage'))
    <div class="alert alert-success alert-styled-left alert-bordered">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
        <strong>Success</strong> {{ session('successMessage') }}
    </div>
@endif

@if (Session::has('errorMessage'))
    <div class="alert alert-danger alert-styled-left alert-bordered">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
        <strong>Error!</strong> {{ session('errorMessage') }}
    </div>
@endif