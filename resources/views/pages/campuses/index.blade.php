<x-app-layout>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Campuses</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                    <li class="breadcrumb-item active">Campuses</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div id="error-messages"></div>
<div id="success-message" style="display: none"></div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

            
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="card-title">List of Campuses</h4>
                <button class="btn btn-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add Campus</button>
            </div>
      

                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Office In Charge</th>
                        <th>Description</th>
                        <th>Location</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($campuses as $campus)
                        <tr>
                            <td>{{ $campus->name }}</td>
                            <td>{{ $campus->president }}</td>
                            <td>{{ $campus->description }}</td>
                            <td>{{ $campus->location }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-light" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="get_data({{ $campus->id }})">View Details</a>
                                    </li>

                                        <li><a class="dropdown-item" href="javascript:void(0);" onclick="delete_campus({{ $campus->id }})">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel"></h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
            <div class="card-body">
                <h4 class="card-title mb-4">Campus Details</h4>

                <form method="POST" action="{{ route('campuses.create') }}" class="needs-validation" novalidate>
                @csrf
                    <div class="mb-3">
                        <label  class="form-label">Campus Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Your Campus Name">
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Office In Charge</label>
                        <input type="text" class="form-control" name="president" placeholder="Enter Office In Charge / Campus Director">
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Description</label>
                        <textarea class="form-control" name="description"  placeholder="Enter Description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Location / Campus </label>
                        <input type="text" class="form-control" name="location" placeholder="G.E Balilihan Campus,Magsija Balilihan">
                        <p style="color:red">G.E Balilihan Campus,Magsija Balilihan</p>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </form>
            </div>
            <!-- end card body -->
    </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRightedit" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel"></h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="px-0 pb-0 tab-campus-content">

        </div>   
    </div>
</div>



</x-app-layout>

<script>
    const appUrl = document.querySelector('meta[name="app-url"]').getAttribute('content');
$(document).ready(function() {

    var table = $("#datatable-buttons").DataTable({
        lengthChange: false,
        buttons: ["copy", "excel", "pdf", "colvis"]
    });

    table.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)");

    $(".dataTables_length select").addClass("form-select form-select-sm");

});

function get_data(id) {
    // Your code to handle the ID
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $('#offcanvasRightedit').offcanvas('show');
    $.ajax({
        type: "POST",
        url:appUrl + '/campuses/edit',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        data: {
            id: id // Your data
        },
        success: function(data) {
            $(".tab-campus-content").show().html(data);
        }
    });
}

function delete_campus(id) {
    // Your code to handle the ID
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type: "POST",
        url:appUrl + '/campuses/delete',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        data: {
            id: id // Your data
        },
        success: function(data) {
            window.location.reload();
        }
    });
}


</script>