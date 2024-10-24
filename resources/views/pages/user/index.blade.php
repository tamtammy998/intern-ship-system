<x-app-layout>
    <!-- Start Page Title -->
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
    <!-- Responsive Table -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List of Intern</h4><br>
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
                    <button class="btn btn-secondary mb-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add User</button>
                    
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Program</th>
                                <th>Campus</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ ucwords($user->first_name . ' ' .$user->middle_name. ' ' .$user->last_name ) }}</td>
                                <td>{{ isset($user->programs) ? ucwords($user->programs->abbreviation) : 'No programs assigned' }}</td>
                                <td>{{ isset($user->campus) ? $user->campus->name : 'No campus assigned' }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->contact }}</td>
                                <td>{{ ucwords($user->gender) }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-light" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <a class="dropdown-item" href="javascript:void(0);" onclick="change_password({{ $user->id }})">Change Password</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="javascript:void(0);" onclick="get_campus_details({{ $user->id }})">View Campus && Programs</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="javascript:void(0);" onclick="get_data({{ $user->id }})">View Details</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="javascript:void(0);" onclick="delete_user({{ $user->id }})">Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel"></h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
            <div class="card-body">
                <h4 class="card-title mb-4">User Details</h4>

                <form method="POST" action="{{ route('user.create') }}" class="needs-validation" novalidate>
                @csrf
                           
        
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">Basic Information</span>    
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                            <span class="d-none d-sm-block">Campus && Programs</span>    
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-3 text-muted">

                    <div class="tab-pane active" id="home" role="tabpanel">
                        
                    <div class="mb-3">
                        <label  class="form-label"> First Name</label>
                        <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" required>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label"> Middle Name</label>
                        <input type="text" name="middle_name" class="form-control" placeholder="Enter Middle Name" >
                    </div>

                    <div class="mb-3">
                        <label  class="form-label"> Last Name</label>
                        <input type="text" name="last_name" class="form-control"  placeholder="Enter Last Name" required>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">User Type</label>
                        <select class="form-select" name="usertype">
                            <option selected>Select Type</option>
                            <option value="Admin">Admin</option>
                            <option value="ojt_in_charge">OJT in Charge</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="control-label">Gender</label>
                        <select class="form-control select2" name="gender">
                            <option>Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Phone #. :</label>
                        <input type="text" name="contact" class="form-control" placeholder="Enter Phone" required>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label"> Email</label>
                        <input type="email" name="email" class="form-control"  placeholder="Enter email" required>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Password</label>
                        <input type="password" name="password" class="form-control"  placeholder="Enter password" required>
                    </div>

                 
                    </div>

                    <div class="tab-pane" id="profile" role="tabpanel">
                        <div class="mb-3">
                            <label class="control-label">Campuses</label>
                            <select class="form-control select2" id="campus" name="campus_id" onchange="get_program(this.value)" required>
                                <option value="">Select</option>
                                @foreach ($campuses as $campus)
                                    <option value="{{ $campus->id }}">{{ $campus->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="control-label">Programs</label>
                            <select class="form-control select2" id="programs" name="courses_id" required>
                            </select>
                        </div>

                        <button type="button" class="btn btn-primary" onclick="addCampusProgram()">Add Campus & Program</button>
                        <table id="campusProgramTable" class="table table-bordered dt-responsive nowrap w-100 mt-3">
                            <thead>
                                <tr>
                                    <th>Campus</th>
                                    <th>Program</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Rows will be added dynamically here -->
                            </tbody>
                        </table>

                        <!-- Hidden inputs to store the selected campus and program IDs -->
                        <input type="hidden" id="selectedCampusIds" name="campus_ids[]" value="">
                        <input type="hidden" id="selectedProgramIds" name="program_ids[]" value="">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
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
        <h4 class="card-title mb-4">User Details</h4>
        <div class="px-0 pb-0 tab-campus-content">

        </div>   
    </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="campusprogram" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel"></h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <h4 class="card-title mb-4">Campus && Program Details</h4>
        <div class="px-0 pb-0 tab-campus-details">

        </div>   
    </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="changePassword" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel"></h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="px-0 pb-0 tab-campus-content-password">

        </div>   
    </div>
</div>

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
                table.column(2).search(selectedCampus).draw();
            });

            $('#program-filter').on('change', function() {
                var selectedProgram = $(this).val();
                table.column(1).search(selectedProgram).draw();
            });
        }, 100);
    });

    function get_program(id) {
        $.ajax({
            type: "POST",
            url: appUrl + '/user/get_program',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: {
                id: id // Your data
            },
            success: function(data) {
                // Assuming there's a select element with an id of #programs
                let programsSelect = $('#programs');
                programsSelect.empty(); // Clear existing options

                // Add a default option (optional)
                programsSelect.append('<option value="">Select a program</option>');

                // Append the programs to the select element
                $.each(data, function(key, program) {
                    programsSelect.append('<option value="' + program.id + '">' + program.abbreviation + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.log('Error: ' + error);
            }
        });
    }

    function get_campus_details(id){
        $('#campusprogram').offcanvas('show');
        $.ajax({
            type: "POST",
            url:appUrl + '/user/campusprogram',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: {
                id: id // Your data
            },
            success: function(data) {
                $(".tab-campus-details").show().html(data);
            }
        });
    }

    function get_data(id) {
    // Your code to handle the ID
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $('#offcanvasRightedit').offcanvas('show');
        $.ajax({
            type: "POST",
            url:appUrl + '/user/edit',
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

    function delete_user(id) {
        // Your code to handle the ID
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: "POST",
            url:appUrl + '/user/delete',
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

    function change_password(id)
    {
        $('#changePassword').offcanvas('show');
        $.ajax({
            type: "POST",
            url:appUrl + '/user/password',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: {
                id: id // Your data
            },
            success: function(data) {
                $(".tab-campus-content-password").show().html(data);
            }
        });
    }

    let campusProgramData = [];

    function addCampusProgram() {
        const campusSelect = document.getElementById('campus');
        const programSelect = document.getElementById('programs');
        const campusId = campusSelect.value;
        const campusName = campusSelect.options[campusSelect.selectedIndex].text;
        const programId = programSelect.value;
        const programName = programSelect.options[programSelect.selectedIndex].text;

        // Check if both campus and program are selected
        if (campusId === "" || programId === "") {
            alert("Please select both a campus and a program.");
            return;
        }

        // Check if the combination already exists
        if (campusProgramData.find(item => item.campusId === campusId && item.programId === programId)) {
            alert("This campus and program combination has already been added.");
            return;
        }

        // Add the selected campus and program to the array
        campusProgramData.push({ campusId, programId, campusName, programName });

        // Add a new row to the table
        const tableBody = document.querySelector("#campusProgramTable tbody");
        const newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td>${campusName}</td>
            <td>${programName}</td>
            <td>
                <button class="btn btn-danger" type="button" onclick="deleteRow(this, '${campusId}', '${programId}')">Delete</button>
            </td>
        `;
        tableBody.appendChild(newRow);

        // Update hidden input values
        updateHiddenInputs();
    }

    function deleteRow(button, campusId, programId) {
        // Remove the row from the table
        const row = button.closest('tr');
        row.remove();

        // Remove the item from the array
        campusProgramData = campusProgramData.filter(item => !(item.campusId === campusId && item.programId === programId));

        // Update hidden input values
        updateHiddenInputs();
    }

    function updateHiddenInputs() {
        const campusIds = campusProgramData.map(item => item.campusId).join(',');
        const programIds = campusProgramData.map(item => item.programId).join(',');
        document.getElementById('selectedCampusIds').value = campusIds;
        document.getElementById('selectedProgramIds').value = programIds;
    }

</script>

<style>
    @media (max-width: 768px) {
        #filters-container {
            flex-direction: column;
            align-items: start;
        }

        #filters-container label {
            width: 100%;
            margin-bottom: 5px;
        }
    }
</style>
