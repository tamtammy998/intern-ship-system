<form method="POST" action="{{ route('document.update', $documents->id) }}" class="needs-validation" novalidate>
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label  class="form-label">Requirement Name</label>
        <input type="text" class="form-control" name="name" value="{{ $documents->name }}" placeholder="Enter Your Campus Name">
    </div>

    <div class="mb-3">
        <label  class="form-label">Description</label>
        <textarea class="form-control" name="description"  placeholder="Enter Description">{{ $documents->description }}</textarea>
    </div>

    <div>
        <button type="submit" class="btn btn-primary w-md">Submit</button>
    </div>
</form>