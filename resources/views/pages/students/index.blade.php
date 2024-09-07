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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">List of Intern</h4><br>

                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Program</th>
                            <th>Campus</th>
                            <th>Completion</th>
                            <th>Date of Internship</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($interns as $intern)
                            <tr>
                                <td>{{ $intern->student_id }}</td>
                                <td>{{ ucwords($intern->first_name . ' ' .$intern->middle_name. ' ' .$intern->last_name ) }}</td>
                                <td>{{ ucwords($intern->gender) }}</td>
                                <td>{{ isset($intern->programs) ? ucwords($intern->programs->abbreviation) : 'No programs assigned' }}</td>
                                <td>{{ isset($intern->campus) ? $intern->campus->name : 'No campus assigned' }}</td>

                                <td>{{ $intern->completion }}</td>
                                <td>{{ $intern->intern_start }}</td>
                                <td>
                                        <ul class="list-inline font-size-20 contact-links mb-0">
                                             <li class="list-inline-item">
                                                <a href="javascript:void(0);" onclick="get_profile({{ $intern->id }})" class="px-2">
                                                    <i class="bx bx-user-circle"></i>
                                                </a>                  
                                            </li>                    
                                        </ul>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

      <!--  Extra Large modal example -->
      <div class="modal fade bs-example-modal-xl" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myExtraLargeModalLabel">Intern Profile </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body intern-profile">
                    
                    </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

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
        var programs = @json($programs);
        var campuses = @json($campuses);

        setTimeout(function() {
            // Create a filter dropdown for campuses
            var campusFilter = '<label style="margin-right: 10px;"> Filter by Campus: <select id="campus-filter" class="form-select form-select-sm" style="display: inline-block; width: auto;">' +
                '<option value="">Select Campus</option>';

            // Generate the options dynamically
            campuses.forEach(function(campus) {
                campusFilter += '<option value="' + campus.name + '">' + campus.name + '</option>';
            });

            campusFilter += '</select></label>';

            // Insert the filter dropdown before the search input
            $(campusFilter).insertBefore('#datatable-buttons_wrapper .dataTables_filter input');

            // Add an event listener to filter the table by the selected program
            $('#campus-filter').on('change', function() {
                var selectedCampus = $(this).val();
                table.column(4).search(selectedCampus).draw(); // Update column index based on actual Program column
            });
        }, 100); // Adjust delay if necessary

        setTimeout(function() {
            // Create a filter dropdown for programs
            var programFilter = '<label style="margin-right: 10px;"> Filter by Programs: <select id="program-filter" class="form-select form-select-sm" style="display: inline-block; width: auto;">' +
                '<option value="">Select Program</option>';

            // Generate the options dynamically
            programs.forEach(function(program) {
                programFilter += '<option value="' + program.abbreviation + '">' + program.abbreviation + '</option>';
            });

            programFilter += '</select></label>';

            // Insert the filter dropdown before the search input
            $(programFilter).insertBefore('#datatable-buttons_wrapper .dataTables_filter input');

            // Add an event listener to filter the table by the selected program
            $('#program-filter').on('change', function() {
                var selectedProgram = $(this).val();
                table.column(3).search(selectedProgram).draw(); // Update column index based on actual Program column
            });
        }, 100); // Adjust delay if necessary

    });

    function get_profile(id)
    {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $('#myModal').modal('show');
        $.ajax({
            type: "POST",
            url:appUrl + '/intern/show',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: {
                id: id // Your data
            },
            success: function(data) {
                $(".intern-profile").show().html(data);
            }
        });
    }
</script>
