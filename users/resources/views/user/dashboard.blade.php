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

<p>USER'S PROJECT DETAILS</p>
<button class="add-project-btn" onclick="window.location.href='{{ route('form.step1') }}'">+ Add Project</button>
<button class="add-inquiry-btn" data-toggle="modal" data-target="#inquiryModal">+ Add Inquiry</button>
@if(Auth::user()->role === 'admin')
    <button class="add-inquiry-list-btn" onclick="window.location.href='{{ route('inquiry.list') }}'">Inquiry List</button>
@endif


<!-- Inquiry Modal -->
<div class="modal fade" id="inquiryModal" tabindex="-1" role="dialog" aria-labelledby="inquiryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inquiryModalLabel">Add Inquiry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('inquiry.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name With Initials</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="designation">Designation</label>
                        <input type="text" class="form-control" id="designation" name="designation" required>
                    </div>

                    <div class="form-group">
                        <label for="inquiry">Details Your Inquiry Here</label>
                        <input type="text" class="form-control" id="inquiry" name="inquiry" required>
                    </div>

                    <div class="form-group">
                        <label for="response">Response</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="response_yes" name="response" value="yes">
                            <label class="form-check-label" for="response_yes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="response_no" name="response" value="no">
                            <label class="form-check-label" for="response_no">No</label>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered" id="userTable" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Contact Number</th>
                            <th>City</th>
                            <th>Status</th>
                            @if (auth()->user()->role == 'admin')
                                <th>Admin Action</th>
                            @endif
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($formData as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->address }}</td>
                                <td>{{ $data->contact_num }}</td>
                                <td>{{ $data->city }}</td>
                                <td>
                                    @if ($data->Status == 'Approved')
                                        <span class="status-dot approved-dot"></span> <span class="status-text status-approved">Approved</span>
                                    @elseif ($data->Status == 'Rejected')
                                        <span class="status-dot rejected-dot"></span> <span class="status-text status-rejected">Rejected</span>
                                    @else
                                        <span class="status-dot pending-dot"></span> <span class="status-text status-pending">Pending</span>
                                    @endif
                                </td>
                                @if (auth()->user()->role == 'admin')
                                    <td>
                                        @if ($data->Status == 'Approved')
                                            <button type="button" class="btn btn-success btn-sm btn-small" disabled>Approved</button>
                                        @elseif ($data->Status == 'Rejected')
                                            <button type="button" class="btn btn-danger btn-sm btn-small" disabled>Rejected</button>
                                        @else
                                            <div>
                                                <button type="button" class="btn btn-success btn-sm btn-small approve-btn" data-id="{{ $data->id }}">Approve</button>
                                                <button type="button" class="btn btn-danger btn-sm btn-small reject-btn" data-id="{{ $data->id }}">Reject</button>
                                            </div>
                                        @endif
                                    </td>
                                @endif
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm btn-small view-btn" data-toggle="modal" data-target="#detailsModal" data-id="{{ $data->id }}">VIEW</button>
                                    <button type="button" class="btn btn-secondary btn-sm btn-small edit-btn" data-toggle="modal" data-target="#editModal" data-id="{{ $data->id }}">EDIT</button>
                                    <button type="button" class="btn btn-danger btn-sm btn-small delete-btn" data-id="{{ $data->id }}">DELETE</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- VIEW MODEL -->
<!-- Add a hidden input field to store the user ID -->
<input type="hidden" id="userId">

<!-- Add a modal form for displaying user details -->
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModalLabel">User Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="userDetailsForm">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" readonly>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" readonly>
                </div>
                <div class="form-group">
                    <label for="contact_num">Contact Number:</label>
                    <input type="text" class="form-control" id="contact_num" readonly>
                </div>
                <div class="form-group">
                    <label for="occupation">Occupation:</label>
                    <input type="text" class="form-control" id="occupation" readonly>
                </div>
                <div class="form-group">
                    <label for="beaf">Brief Intro About The Project:</label>
                    <input type="text" class="form-control" id="beaf" readonly>
                </div>
                <div class="form-group">
                    <label for="expect_soluation">Expected Solution:</label>
                    <input type="text" class="form-control" id="expect_soluation" readonly>
                </div>
                <div class="form-group">
                    <label for="photo">Photo:</label>
                    <input type="text" class="form-control" id="photo" readonly>
                </div>
                <div class="form-group">
                    <label for="problem_level">Problem Level:</label>
                    <input type="text" class="form-control" id="problem_level" readonly>
                </div>
                <div class="form-group">
                    <label for="suggestions">Suggestions:</label>
                    <input type="text" class="form-control" id="suggestions" readonly>
                </div>
                <div class="form-group">
                    <label for="district">District:</label>
                    <input type="text" class="form-control" id="district" readonly>
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" class="form-control" id="city" readonly>
                </div>
                <div class="form-group">
                    <label for="postal_code">Postal Code:</label>
                    <input type="text" class="form-control" id="postal_code" readonly>
                </div>
                <div class="form-group">
                    <label for="grama_name">Grama Name:</label>
                    <input type="text" class="form-control" id="grama_name" readonly>
                </div>
                <div class="form-group">
                    <label for="gcontact_num">Grama Contact Number:</label>
                    <input type="text" class="form-control" id="gcontact_num" readonly>
                </div>
                <div class="form-group">
                    <label for="authorized_per_name">Authorized Person Name:</label>
                    <input type="text" class="form-control" id="authorized_per_name" readonly>
                </div>
                <div class="form-group">
                    <label for="authorized_per_num">Authorized Person Number:</label>
                    <input type="text" class="form-control" id="authorized_per_num" readonly>
                </div>
                <div class="form-group">
                    <label for="Status">Status:</label>
                    <input type="text" class="form-control" id="Status" readonly>
                </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- EDIT MODEL -->
<!-- Add a hidden input field to store the user ID -->
<input type="hidden" id="editUserId">

<!-- Add a modal form for editing user details -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit User Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editUserDetailsForm">
                    @csrf
                    <input type="hidden" id="editUserId">
                    <div class="form-group">
                        <label for="editName">Name:</label>
                        <input type="text" class="form-control" id="editName" name="name">
                    </div>

                    <div class="form-group">
                        <label for="editName">Authorized Persion Number:</label>
                        <input type="text" class="form-control" id="editauthorized_per_num" name="authorized_per_num">
                    </div>

                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="saveChangesBtn">Save Changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- END EDIT MODEL -->


<script>
$(document).ready(function() {
    var userTable = $('#userTable').DataTable({
        processing: true,
        serverSide: false,
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'address', name: 'address'},
            {data: 'contact_num', name: 'contact_num'},
            {data: 'city', name: 'city'},
            {data: 'Status', name: 'Status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        order: [[0, 'asc']],
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search...",
            paginate: {
                first: "First",
                last: "Last",
                next: "&raquo;",
                previous: "&laquo;"
            }
        },
        lengthMenu: [10, 25, 50, 75, 100],
        pageLength: 10
    });

    $(document).on('click', '.view-btn', function() {
        var id = $(this).data('id');
        $.ajax({
            url: '/user/' + id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                var formData = response.formData;
                $('#name').val(formData.name);
                $('#email').val(formData.email);
                $('#address').val(formData.address);
                $('#contact_num').val(formData.contact_num);
                $('#occupation').val(formData.occupation);
                $('#beaf').val(formData.beaf);
                $('#expect_soluation').val(formData.expect_soluation);
                $('#photo').val(formData.photo);
                $('#problem_level').val(formData.problem_level);
                $('#suggestions').val(formData.suggestions);
                $('#district').val(formData.district);
                $('#city').val(formData.city);
                $('#postal_code').val(formData.postal_code);
                $('#grama_name').val(formData.grama_name);
                $('#gcontact_num').val(formData.gcontact_num);
                $('#authorized_per_name').val(formData.authorized_per_name);
                $('#authorized_per_num').val(formData.authorized_per_num);
                $('#Status').val(formData.Status);

                $('#detailsModal').modal('show'); // Show the modal
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText); // Log the error response for debugging purposes
            }
        });
    });
});


$(document).on('click', '.edit-btn', function() {
    var id = $(this).data('id');
    $.ajax({
        url: '/user/' + id + '/edit',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            var formData = response.formData;

            $('#editUserId').val(formData.id);
            $('#editName').val(formData.name);
            $('#editauthorized_per_num').val(formData.authorized_per_num);

            $('#editModal').modal('show'); // Show the edit modal
        },
        error: function(xhr, status, error) {
            console.log(xhr.responseText); // Log the error response for debugging purposes
        }
    });
});

//EDIT FUNCTION
$(document).on('click', '#saveChangesBtn', function() {
    var id = $('#editUserId').val();
    var formData = $('#editUserDetailsForm').serialize();

    // Get the CSRF token from the page's meta tag
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: '/user/' + id,
        type: 'PUT',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': token
        },
        dataType: 'json',
        success: function(response) {
            $('#editModal').modal('hide');
        },
        error: function(xhr, status, error) {
            console.log(xhr.responseText); // Log the error response for debugging purposes
        }
    });
});

$(document).on('click', '.delete-btn', function() {
    var id = $(this).data('id');
    if (confirm("Are you sure you want to delete this user?")) {
        $.ajax({
            url: '/user/' + id,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#userTable tbody').find('tr[data-id="' + id + '"]').remove();
                
                // Reload the page
                location.reload();
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText); 
            }
        });
    }
});

//APPROVE OR REJECT
 $(document).on('click', '.approve-btn, .reject-btn', function() {
        var button = $(this);
        var id = button.data('id');
        var status = button.hasClass('approve-btn') ? 'Approved' : 'Rejected';

        // Send an AJAX request to update the status
        $.ajax({
            url: '/user/' + id + '/status',
            type: 'PUT',
            data: { status: status },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Handle the success response
                console.log(response);

                // Disable the clicked button and show the corresponding status button
                button.attr('disabled', true);
                if (status === 'Approved') {
                    button.after('<button type="button" class="btn btn-success btn-sm" disabled>Approved</button>');
                } else {
                    button.after('<button type="button" class="btn btn-danger btn-sm" disabled>Rejected</button>');
                }

                // Show the hidden button
                button.closest('td').find('.hidden-buttons').show();

                // Reload the page
                location.reload();
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText); // Log the error response for debugging purposes
            }
        });
    });
</script>

</body>
</html>
