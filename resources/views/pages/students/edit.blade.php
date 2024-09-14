<form method="POST" action="{{ route('user.profile_update', $users->id) }}" class="needs-validation" novalidate>
@csrf
@method('PUT')
    <div class="mb-3">
        <label  class="form-label"> First Name</label>
        <input type="text" name="first_name" value="{{ $users->first_name }}" class="form-control" placeholder="Enter First Name" required>
    </div>

    <div class="mb-3">
        <label  class="form-label"> Middle Name</label>
        <input type="text" name="middle_name"  value="{{ $users->middle_name }}" class="form-control" placeholder="Enter Middle Name" >
    </div>

    <div class="mb-3">
        <label  class="form-label"> Last Name</label>
        <input type="text" name="last_name" value="{{ $users->last_name }}"  class="form-control"  placeholder="Enter Last Name" required>
    </div>

    <div class="mb-3" style="display: none;">
        <!-- <label  class="form-label">User Type</label>
        <select class="form-select" name="usertype">
            <option value="">Select a Type</option>
            <option value="Admin" {{ $users->usertype == 'Admin' ? 'selected' : '' }}>Admin</option>
            <option value="ojt_in_charge" {{ $users->usertype == 'ojt_in_charge' ? 'selected' : '' }}>OJT in Charge</option>
        </select> -->
        <input type="text" name="usertype" value="{{ $users->usertype }}"  class="form-control"  required>

    </div>

    <div class="mb-3">
        <label class="control-label">Gender</label>
        <select class="form-control select2" name="gender">
            <option>Select</option>
            <option value="Male" {{ $users->gender == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female"{{ $users->gender == 'Female' ? 'selected' : '' }}>Female</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="control-label">Campuses</label>

        <select class="form-control select2" id="campus_id" name="campus_id" onchange="get_program1(this.value)" required>
            <option value="">Select</option>
            @foreach ($campuses as $campus)
                <option value="{{ $campus->id }}" {{ $users->campus_id == $campus->id ? 'selected' : '' }}>{{ $campus->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="control-label">Programs</label>
        <select class="form-control select2" id="programs1" name="courses_id" required>
            <option value="">Select</option>
            @foreach ($programs as $program)
                <option value="{{ $program->id }}" {{ $users->courses_id == $program->id ? 'selected' : '' }}>{{ $program->abbreviation }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label  class="form-label">Phone #. :</label>
        <input type="text" name="contact" value="{{ $users->contact }}" class="form-control" placeholder="Enter Phone" required>
    </div>

    <div class="mb-3">
        <label  class="form-label"> Email</label>
        <input type="email" name="email" value="{{ $users->email }}"  class="form-control"  placeholder="Enter email" required>
    </div>

    <div class="mb-3">
        <label  class="form-label">Password</label>
        <input type="password" name="password" class="form-control"  placeholder="Enter password" required>
    </div>

    <div>
        <button type="submit" class="btn btn-primary w-md">Submit</button>
    </div>
</form>

<script>
      $(document).ready(function() {

        var selectedValue = $('#campus_id').val();
        $.ajax({
            type: "POST",
            url: appUrl + '/user/get_program',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: {
                id: selectedValue // Your data
            },
            success: function(data) {
                // Assuming there's a select element with an id of #programs
                let programsSelect = $('#programs1');
                programsSelect.empty(); // Clear existing options

                // Add a default option (optional)
                programsSelect.append('<option value="">Select a program</option>');

                // Append the programs to the select element
                $.each(data, function(key, program) {
                    var isSelected = program.campus_id === {{ $users->campus_id }} ? 'selected' : '';
                    programsSelect.append('<option value="' + program.id + '" ' + isSelected + '>' + program.abbreviation + '</option>');
                });

            },
            error: function(xhr, status, error) {
                console.log('Error: ' + error);
            }
        });
    });

      function get_program1(id) {
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
                let programsSelect = $('#programs1');
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
</script>