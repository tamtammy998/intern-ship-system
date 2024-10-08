<form method="POST" action="{{ route('campuses.update', $campuses->id) }}" class="needs-validation" novalidate>
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Campus Name</label>
        <input type="text" class="form-control" name="name" value="{{ $campuses->name }}" placeholder="Enter Your Campus Name">
    </div>

    <div class="mb-3">
        <label class="form-label">Office In Charge</label>
        <input type="text" class="form-control" name="president" value="{{ $campuses->oic }}" placeholder="Enter Office In Charge">
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" name="description" placeholder="Enter Description">{{ $campuses->description }}</textarea>
    </div>

    <div class="mb-3">
        <label  class="form-label">Location / Campus </label>
        <input type="text" class="form-control" value="{{ $campuses->location }}" name="location" placeholder="G.E Balilihan Campus,Magsija Balilihan">
        <p style="color:red">G.E Balilihan Campus,Magsija Balilihan</p>
    </div>

    <div>
        <button type="submit" class="btn btn-primary w-md">Update</button>
    </div>
</form>
