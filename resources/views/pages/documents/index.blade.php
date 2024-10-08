<x-app-layout>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Requirements</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                    <li class="breadcrumb-item active">Requirements</li>
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
                <h4 class="card-title">List of Requirements</h4>
                <!-- <button class="btn btn-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add Requirement</button> -->
            </div>

                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <!-- @foreach($documents as $document)
                        <tr>
                            <td>{{ $document->name}}</td>
                            <td>{{ $document->description}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-light" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="get_data({{ $document->id }})">View Details</a>
                                    </li>

                                        <li><a class="dropdown-item" href="javascript:void(0);" onclick="delete_document({{ $document->id }})">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach -->

                        <tr>
                            <td>Memorandom of Agreement</td>
                            <td></td>
                            <td>
                                <a class="profile-action text-info" href="javascript:void(0)"  title="Profile" onclick="pdf_form(1)">
                                    <i class="bx bx-printer"></i> 
                                    print
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>Parents Consent</td>
                            <td></td>
                            <td>
                                <a class="profile-action text-info" href="javascript:void(0)"  title="Profile" onclick="pdf_form(2)">
                                    <i class="bx bx-printer"></i> 
                                    print
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>Accomplishment Reports</td>
                            <td></td>
                            <td>
                                <a class="profile-action text-info" href="javascript:void(0)"  title="Profile" onclick="pdf_form(3)">
                                    <i class="bx bx-printer"></i> 
                                    print
                                </a>
                            </td>
                        </tr>


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
                <h4 class="card-title mb-4">Requirement Details</h4>

                <form method="POST" action="{{ route('document.create') }}" class="needs-validation" novalidate>
                @csrf
                    <div class="mb-3">
                        <label  class="form-label">Requirement Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Your Campus Name">
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Description</label>
                        <textarea class="form-control" name="description"  placeholder="Enter Description"></textarea>
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
        url:appUrl + '/document/edit',
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

function delete_document(id) {
    // Your code to handle the ID
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type: "POST",
        url:appUrl + '/document/delete',
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


function pdf_form(id)
{   
    var win = window.open(appUrl + "/print/pdfrequest/" + id, '_blank');
}
</script>