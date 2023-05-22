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
                <div class="card-header">{{ __('Project Summary') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('form.step4.post') }}">
                        @csrf

                        <input type="hidden" name="id" value="{{ $formData->id }}">




                        <div class="row">
            <div class="col-md-6">
                <h2>Personal Information</h2>
                <p><strong>Name:</strong> {{ $formData->name }}</p>
                <p><strong>Email:</strong> {{ $formData->email }}</p>
                <p><strong>Address:</strong> {{ $formData->address }}</p>
                <p><strong>Contact Number:</strong> {{ $formData->contact_num }}</p>
                <p><strong>Occupation:</strong> {{ $formData->occupation }}</p>
            </div>
            <div class="col-md-6">
            <h2>Problem Information</h2>
            <p><strong>Beaf:</strong> {{ $formData->beaf }}</p>
            <p><strong>Expected Solution:</strong> {{ $formData->expect_soluation }}</p>
            <p><strong>Photo:</strong></p>
    @if ($formData->photo)
        <img src="{{ asset('storage/' . $formData->photo) }}" alt="Uploaded Photo" style="max-width: 200px;">
    @else
        <p>No photo uploaded</p>
    @endif
            <p><strong>Problem Level:</strong> {{ $formData->problem_level }}</p>
            <p><strong>Suggestions:</strong> {{ $formData->suggestions }}</p>
        </div>


        <div class="row">
            <div class="col-md-6">
                <h2>Address Information</h2>
                <p><strong>District:</strong> {{ $formData->district }}</p>
                <p><strong>City:</strong> {{ $formData->city }}</p>
                <p><strong>Postal Code:</strong> {{ $formData->postal_code }}</p>
                <p><strong>Grama Name:</strong> {{ $formData->grama_name }}</p>
                <p><strong>Grama Contact Number:</strong> {{ $formData->gcontact_num }}</p>
            </div>
            <div class="col-md-6">
                <h2>Authorized Person Information</h2>
                <p><strong>Name:</strong> {{ $formData->authorized_per_name }}</p>
                <p><strong>Contact Number:</strong> {{ $formData->authorized_per_num }}</p>
            </div>
        </div>
    </div>



                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="background-color:green; border:green;" onclick="event.preventDefault(); window.location.href='{{ route('user.dashboard') }}';">
                                    {{ __('SUBMIT') }}
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