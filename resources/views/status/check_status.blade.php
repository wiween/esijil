@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><img src="{{ asset('images/jatasmall.jpg') }}"> Semak Status</div>

                    <div class="card-body">
                        <form method="POST" class="form-horizontal" role="form">
                            @csrf

                            <div class="form-group row">
                                <label for="ic_number" class="col-sm-4 col-form-label text-md-right">No KP</label>

                                <div class="col-md-6">
                                    <input name="ic_number" type="text" class="form-control" value="{{ old('ic_number') }}" required autofocus>
                                    @include('partials.error_block', ['item' => 'ic_number'])
                                </div>
                            </div>

                            {{--<div class="form-group row">--}}
                                {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>--}}

                                    {{--@if ($errors->has('password'))--}}
                                        {{--<span class="invalid-feedback">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                      Semak Status
                                    </button>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
