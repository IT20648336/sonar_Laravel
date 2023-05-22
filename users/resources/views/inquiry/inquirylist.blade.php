<!DOCTYPE html>
<html>
<head>
<title>USER'S DETAILS</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script> <!-- Add this line -->

    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            background-image: url('/images/bg.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
    </style>

</head>
<body>
@include('Navigation.header')
<p>USER'S INQUIRY LIST</p>

@if(count($inquiries) > 0)
    <form method="POST" action="{{ route('inquiries.updateAction') }}">
        @csrf
        <table class="table table-bordered" id="userTable" style="margin-left: auto; margin-right: auto; width: 80%;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Inquiry</th>
                    <th>Response</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inquiries as $inquiry)
                    <tr>
                        <td>{{ $inquiry->id }}</td>
                        <td>{{ $inquiry->name }}</td>
                        <td>{{ $inquiry->designation }}</td>
                        <td>{{ $inquiry->inquiry }}</td>
                        <td>{{ $inquiry->response }}</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="action[]" value="{{ $inquiry->id }}">
                            </div>
                        </td>
                        <td>
                            @if($inquiry->action == 1)
                                Accept
                            @else
                                Pending
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Save Actions</button>
    </form>
@else
    <p>No inquiries found.</p>
@endif