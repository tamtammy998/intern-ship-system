<x-app-layout>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Programs</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                    <li class="breadcrumb-item active">Programs</li>
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
                <h4 class="card-title">List of Programs</h4>
            </div>
      
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
            <button class="btn btn-secondary mb-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add Program</button>

      

                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>Abbreviation</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Campus</th>
                        <th>Ojt in Charge / Dean</th>
                        <th>Action</th>
               
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($programs as $program)
                        <tr>
                            <td>{{ $program->abbreviation}}</td>
                            <td>{{ $program->name}}</td>
                            <td>{{ $program->description}}</td>
                            <td>{{ isset($program->campus) ? $program->campus->name : 'No campus assigned' }}</td>
                            <td>{{ $program->oic}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-light" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="get_data({{ $program->id }})">View Details</a>
                                    </li>

                                        <li><a class="dropdown-item" href="javascript:void(0);" onclick="delete_campus({{ $program->id }})">Delete</a></li>
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

                <form method="POST" action="{{ route('programs.create') }}" class="needs-validation" novalidate>
                @csrf
                    <div class="mb-3">
                        <label  class="form-label">Abbreviation</label>
                        <input type="text" class="form-control" name="abbreviation" placeholder="Enter Abbreviation">
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Program Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Program Name">
                    </div>

                    <div class="mb-3">
                        <label class="control-label">Campuses</label>
                        <select class="form-control select2" name="campus_id" required>
                            <option value="">Select</option>
                            @foreach ($campuses as $campus)
                                <option value="{{ $campus->id }}">{{ $campus->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('campus_id')" class="mt-2" />
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">OJT Director / Dean</label>
                        <input type="text" class="form-control" name="oic" placeholder="OJT Director / Dean">
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

        // Fetching the unique programs from Laravel Blade
        var campuses = @json($campuses);

        // setTimeout(function() {
        //     // Create a filter dropdown for campuses
        //     var campusFilter = '<label "> Filter by Campus: <select id="campus-filter" class="form-select form-select-sm" style="display: inline-block; width: auto;">' +
        //         '<option value="">Select Campus</option>';

        //     // Generate the options dynamically
        //     campuses.forEach(function(campus) {
        //         campusFilter += '<option value="' + campus.name + '">' + campus.name + '</option>';
        //     });

        //     campusFilter += '</select></label>';

        //     // Insert the filter dropdown before the search input
        //     $(campusFilter).insertBefore('#datatable-buttons_wrapper .dataTables_filter input');

        //     // Add an event listener to filter the table by the selected program
        //     $('#campus-filter').on('change', function() {
        //         var selectedCampus = $(this).val();
        //         table.column(3).search(selectedCampus).draw(); // Update column index based on actual Program column
        //     });
        // }, 100); // Adjust delay if necessary


        setTimeout(function() {
            // Create a filter dropdown for campuses
            var campusFilter = '<label class="me-2"> Filter by Campus: <select id="campus-filter" class="form-select form-select-sm d-inline-block w-auto">' +
                '<option value="">Select Campus</option>';

            campuses.forEach(function(campus) {
                campusFilter += '<option value="' + campus.name + '">' + campus.name + '</option>';
            });

            campusFilter += '</select></label>';

            // Insert the filter dropdowns before the search input
            $('#filters-container').append(campusFilter);

            // Add event listeners to filter the table by selected program or campus
            $('#campus-filter').on('change', function() {
                var selectedCampus = $(this).val();
                table.column(3).search(selectedCampus).draw();
            });

        }, 100);


    });


function get_data(id) {
    // Your code to handle the ID
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $('#offcanvasRightedit').offcanvas('show');
    $.ajax({
        type: "POST",
        url:appUrl + '/programs/edit',
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
        url:appUrl + '/programs/delete',
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