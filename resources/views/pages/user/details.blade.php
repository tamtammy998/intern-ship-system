<div class="tab-pane" id="profile" role="tabpanel">
<form method="POST" action="{{ route('user.create_program') }}" class="needs-validation" novalidate>
@csrf
    <div class="mb-0">
        <label  class="form-label"> First Name : {{ $user->first_name }}</label>
    </div>

    <div class="mb-0">
        <label  class="form-label"> Middle Name : {{ $user->middle_name }}</label>
    </div>

    <div class="mb-0">
        <label  class="form-label"> Last Name : {{ $user->last_name }}</label>
    </div>

    <div class="mb-3">
        <label class="control-label">Campuses</label>
        <select class="form-control select2" id="campus1" name="campus_id" onchange="get_program(this.value)" required>
            <option value="">Select</option>
            @foreach ($campuses as $campus)
                <option value="{{ $campus->id }}">{{ $campus->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="control-label">Programs</label>
        <select class="form-control select2" id="programs1" name="courses_id" required>
        </select>
    </div>

    <button type="button" class="btn btn-primary" onclick="addCampusProgram()">Add Campus & Program</button>
    <table id="campusProgramTable1" class="table table-bordered dt-responsive nowrap w-100 mt-3">
        <thead>
            <tr>
                <th>Campus</th>
                <th>Program</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($campuspgram as $row)
            <tr id="program-row-{{ $row->id }}">
                <td>{{ $row->campus->name }}</td>
                <td>{{ $row->program->abbreviation }}</td>
                <td><button class="btn btn-danger" type="button" onclick="deleteProgram({{ $row->id }})">Delete</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Hidden inputs to store the selected campus and program IDs -->
    <input type="hidden" id="selectedCampusIds1" name="campus_ids[]" value="">
    <input type="hidden" id="selectedProgramIds1" name="program_ids[]" value="">
    <input type="hidden" name="user_id" value="{{ $id }}">
    <div>
        <button type="submit" class="btn btn-primary w-md">Submit</button>
    </div>
</form>
</div>

<script>

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
                // Check if data is an array
                if (Array.isArray(data)) {
                    let programsSelect = $('#programs1');
                    programsSelect.empty(); // Clear existing options

                    // Add a default option (optional)
                    programsSelect.append('<option value="">Select a program</option>');

                    // Append the programs to the select element
                    $.each(data, function(key, program) {
                        programsSelect.append('<option value="' + program.id + '">' + program.abbreviation + '</option>');
                    });
                } else {
                    console.error('Unexpected response format:', data);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error occurred:', error);
                console.log('XHR:', xhr); // Log the full XHR response for more details
            }
        });
    }

    function deleteProgram(id)
    {
        $.ajax({
            type: "POST",
            url: appUrl + '/user/delete_program',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: {
                id: id // Your data
            },
            success: function(data) {
                $('#program-row-' + id).remove();
            },
            error: function(xhr, status, error) {
                console.error('Error occurred:', error);
                console.log('XHR:', xhr); // Log the full XHR response for more details
            }
        });
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

    function addCampusProgram() {
        const campusSelect = document.getElementById('campus1');
        const programSelect = document.getElementById('programs1');
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
        const tableBody = document.querySelector("#campusProgramTable1 tbody");
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

    function updateHiddenInputs() {
        const campusIds = campusProgramData.map(item => item.campusId).join(',');
        const programIds = campusProgramData.map(item => item.programId).join(',');
        document.getElementById('selectedCampusIds1').value = campusIds;
        document.getElementById('selectedProgramIds1').value = programIds;
    }
</script>