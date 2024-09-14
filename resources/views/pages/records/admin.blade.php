<x-app-layout>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Accomplishment </h4>

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
                <h4 class="card-title">Accomplishment Reports</h4>
            </div>
      
      
                @if(Auth::user()->usertype == 'Admin')
                <div class="d-flex flex-wrap mb-2">
                        <div class="row">
                            <div class="col-md-9 d-flex align-items-center">
                                <div id="filters-container" class="d-flex flex-wrap w-100">
                                    <!-- Your filters content can go here -->
                                </div>
                            </div>
                            
                            <div class="col-md-3 d-flex align-items-center justify-content-end">
                            </div>
                        </div>
                    </div>
                @endif

                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>Intern Name</th>
                        <th>Campus</th>
                        <th>Program</th>
                        <th>Date Range</th>
                        <th>Hours</th>
                        <th>Attachment</th>
                        <th>Remarks</th>
                        <th>Status</th>
                        <th>Date Uploaded</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($records as $record)
                        <tr>
                            <td>{{ ucwords($record->student->first_name . ' ' .$record->student->middle_name. ' ' .$record->student->last_name ) }}</td>
                            <td>{{ ucwords($record->campus->name) }}</td>
                            <td>{{ ucwords($record->programs->abbreviation) }}</td>
                            <td>{{ date('F j, Y', strtotime($record->date_from)) }} - {{ date('F j, Y', strtotime($record->date_to)) }} </td>
                            <td>{{ $record->hours }}</td>
                            <td>{{ $record->document_name }}</td>
                            <td>{{ $record->remarks }}</td>
                            <td>{{ $record->status }}</td>
                            <td>{{ date('F j, Y', strtotime($record->created_at)) }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    @if(in_array(strtolower($record->document_extension), ['jpg', 'jpeg', 'pdf']))
                                        <a class="btn btn-primary btn-sm me-2" 
                                            href="#" 
                                            title="View" 
                                            onclick="handlePreview(event, '{{ asset('storage/'. $record->document_path) }}', {{ $record->id }})">
                                            <i class="bx bx-file"></i>
                                        </a>
                                    @endif
                                    
                                    <a class="btn btn-success btn-sm me-2" 
                                        href="#" 
                                        title="Download" 
                                        onclick="handleDownload(event, {{ $record->id }})">
                                        <i class="bx bxs-download"></i>
                                    </a>

                                        <button type="submit" onclick="approved_report({{ $record->id }})" class="btn btn-warning btn-sm" title="Approved">
                                            <i class='bx bxs-hand-up'></i>
                                        </button>
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
                <h4 class="card-title mb-4">Requirement Details</h4>

                <form method="POST" action="{{ route('record.create') }}" class="needs-validation" novalidate enctype="multipart/form-data">
                @csrf

                 <div class="mb-3">
                    <label class="control-label">Date From</label>
                    <input class="form-control" name="date_from" type="date">
                </div>

                <div class="mb-3">
                    <label class="control-label">Date To</label>
                    <input class="form-control" name="date_to" type="date">
                </div>

                <div class="mb-3">
                    <label class="control-label">Hours</label>
                    <input type="number" name="hours" class="form-control" placeholder="Enter Hours" required>
                </div>

                    <div class="mb-3">
                        <label class="form-label">Attachement</label>
                        <div class="input-group">
                            <input type="file" name="file" class="form-control" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>    
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Remarks</label>
                        <textarea class="form-control" name="remarks"  placeholder="Enter Description"></textarea>
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
    <h4 class="card-title mb-4">Requirement Details</h4>
        <div class="px-0 pb-0 tab-campus-content">

        </div>   
    </div>
</div>
<style>
    .swal2-container .swal2-title {
        text-align: center !important;
        margin: 0;
    }
</style>

</x-app-layout>

<script>

const appUrl = document.querySelector('meta[name="app-url"]').getAttribute('content');
$(document).ready(function() {
        var table = $("#datatable-buttons").DataTable({
            lengthChange: false,
            buttons: ["copy", "excel", "pdf", "colvis"],
            responsive: true
        });

        table.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)");
        $(".dataTables_length select").addClass("form-select form-select-sm");

        // Fetching the unique programs from Laravel Blade
        var programs = @json($programs);
        var campuses = @json($campuses);

        setTimeout(function() {
            // Create a filter dropdown for campuses
            var campusFilter = '<label class="me-2"> Filter by Campus: <select id="campus-filter" class="form-select form-select-sm d-inline-block w-auto">' +
                '<option value="">Select Campus</option>';

            campuses.forEach(function(campus) {
                campusFilter += '<option value="' + campus.name + '">' + campus.name + '</option>';
            });

            campusFilter += '</select></label>';

            // Create a filter dropdown for programs
            var programFilter = '<label class="me-2"> Filter by Programs: <select id="program-filter" class="form-select form-select-sm d-inline-block w-auto">' +
                '<option value="">Select Program</option>';

            programs.forEach(function(program) {
                programFilter += '<option value="' + program.abbreviation + '">' + program.abbreviation + '</option>';
            });

            programFilter += '</select></label>';

            // Insert the filter dropdowns before the search input
            $('#filters-container').append(campusFilter).append(programFilter);

            // Add event listeners to filter the table by selected program or campus
            $('#campus-filter').on('change', function() {
                var selectedCampus = $(this).val();
                table.column(1).search(selectedCampus).draw();
            });

            $('#program-filter').on('change', function() {
                var selectedProgram = $(this).val();
                table.column(2).search(selectedProgram).draw();
            });
        }, 100);
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

function approved_report(id) {
    // Your code to handle the ID
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $('#offcanvasRightedit').offcanvas('show');
    $.ajax({
        type: "POST",
        url:appUrl + '/record/data',
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

async function handlePreview(event, imageUrl, documentId) {
    event.preventDefault(); // Prevent default anchor navigation

    try {
        // Create a temporary link element to view file in new tab
        const link = document.createElement('a');
        link.href = imageUrl;
        link.target = '_blank';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        
        // Reload the page to refresh the table
        setTimeout(() => { window.location.reload(); }, 100);
    } catch (error) {
        console.error('Error:', error);
    }
}

async function handleDownload(event, documentId) {
    event.preventDefault(); // Prevent default anchor behavior

    try {
        // Create a hidden form to trigger the file download
        const form = document.createElement('form');
        form.method = 'GET';
        form.action = `/record/documents/${documentId}/download`; // Corrected to match the route
        form.style.display = 'none';

        // Append the form to the body and submit it
        document.body.appendChild(form);
        form.submit();

        // Optional: Reload the page to refresh the table
        // setTimeout(() => {
        //     window.location.reload();
        // }, 600);
    } catch (error) {
        console.error('Error during download:', error);
    }
}

</script>