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
                <div class="card-header">{{ __('Problem Information') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('form.step2.post') }}">
                        @csrf

                        <input type="hidden" name="id" value="{{ $formData->id }}">

                        <div class="row mb-3">
                            <label for="beaf" class="col-md-4 col-form-label text-md-end">{{ __('Breif Explain About The Project') }}</label>

                            <div class="col-md-6">
                                <input id="beaf" type="text" class="form-control @error('beaf') is-invalid @enderror" name="beaf" value="{{ old('beaf') }}" required autocomplete="beaf" autofocus>

                                @error('beaf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="expect_soluation" class="col-md-4 col-form-label text-md-end">{{ __('Expected Soluation') }}</label>

                            <div class="col-md-6">
                                <input id="expect_soluation" type="text" class="form-control @error('expect_soluation') is-invalid @enderror" name="expect_soluation" value="{{ old('expect_soluation') }}" required autocomplete="expect_soluation">

                                @error('expect_soluation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                        <label for="photo" class="col-md-4 col-form-label text-md-end">{{ __('Photo') }}</label>
                        <div class="col-md-6">
                            <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}" required autocomplete="photo">
                            @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                     </div>


                        <div class="row mb-3">
                            <label for="problem_level" class="col-md-4 col-form-label text-md-end">{{ __('Problem Level') }}</label>

                            <div class="col-md-6">
                                <input id="problem_level" type="text" class="form-control @error('problem_level') is-invalid @enderror" name="problem_level" value="{{ old('problem_level') }}" required autocomplete="problem_level">

                                @error('problem_level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="suggestions" class="col-md-4 col-form-label text-md-end">{{ __('Suggestions') }}</label>

                            <div class="col-md-6">
                                <input id="suggestions" type="text" class="form-control @error('suggestions') is-invalid @enderror" name="suggestions" value="{{ old('suggestions') }}" required autocomplete="suggestions">

                                @error('suggestions')
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