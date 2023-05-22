@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<style>
    body {
        background-image: url('/images/form_bg1.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }
</style>

<body>
    <div class="container">
    </div>
</body>
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Address Information') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('form.step3.post') }}">
                        @csrf

                        <input type="hidden" name="id" value="{{ $formData->id }}">

                        <div class="row mb-3">
                            <label for="district" class="col-md-4 col-form-label text-md-end">{{ __('District') }}</label>

                            <div class="col-md-6">
                                <input id="district" type="text" class="form-control @error('beaf') is-invalid @enderror" name="district" value="{{ old('district') }}" required autocomplete="district" autofocus>

                                @error('district')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="city" class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city">

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="postal_code" class="col-md-4 col-form-label text-md-end">{{ __('Postal Code') }}</label>

                            <div class="col-md-6">
                                <input id="postal_code" type="text" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" value="{{ old('postal_code') }}" required autocomplete="postal_code">

                                @error('postal_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="grama_name" class="col-md-4 col-form-label text-md-end">{{ __('Grama Niladhari Name') }}</label>

                            <div class="col-md-6">
                                <input id="grama_name" type="text" class="form-control @error('grama_name') is-invalid @enderror" name="grama_name" value="{{ old('grama_name') }}" required autocomplete="grama_name">

                                @error('grama_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gcontact_num" class="col-md-4 col-form-label text-md-end">{{ __('Grama Niladhari Contact Number') }}</label>

                            <div class="col-md-6">
                                <input id="gcontact_num" type="text" class="form-control @error('gcontact_num') is-invalid @enderror" name="gcontact_num" value="{{ old('gcontact_num') }}" required autocomplete="gcontact_num">

                                @error('gcontact_num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="authorized_per_name" class="col-md-4 col-form-label text-md-end">{{ __('Authorized Person Name') }}</label>

                            <div class="col-md-6">
                                <input id="authorized_per_name" type="text" class="form-control @error('authorized_per_name') is-invalid @enderror" name="authorized_per_name" value="{{ old('authorized_per_name') }}" required autocomplete="authorized_per_name">

                                @error('authorized_per_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="authorized_per_num" class="col-md-4 col-form-label text-md-end">{{ __('Authorized Person Contact Number') }}</label>

                            <div class="col-md-6">
                                <input id="authorized_per_num" type="text" class="form-control @error('authorized_per_num') is-invalid @enderror" name="authorized_per_num" value="{{ old('authorized_per_num') }}" required autocomplete="authorized_per_num">

                                @error('authorized_per_num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="background-color:green; border:green;">
                                    {{ __('Next') }}
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