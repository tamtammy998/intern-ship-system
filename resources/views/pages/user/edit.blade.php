<form method="POST" action="{{ route('user.update', $users->id) }}" class="needs-validation" novalidate>
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

    <div class="mb-3">
        <label  class="form-label">Office In Charge</label>
        <select class="form-select" name="usertype">
            <option value="">Select a Type</option>
            <option value="Admin" {{ $users->usertype == 'Admin' ? 'selected' : '' }}>Admin</option>
            <option value="ojt_in_charge" {{ $users->usertype == 'ojt_in_charge' ? 'selected' : '' }}>OJT in Charge</option>
        </select>
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

        <select class="form-control select2" name="campus_id" required>
            <option value="">Select</option>
            @foreach ($campuses as $campus)
                <option value="{{ $campus->id }}" {{ $users->campus_id == $campus->id ? 'selected' : '' }}>{{ $campus->name }}</option>
            @endforeach
        </select>



    </div>

    <div class="mb-3">
        <label class="control-label">Programs</label>
        <select class="form-control select2" name="courses_id" required>
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