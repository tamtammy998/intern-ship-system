<form method="POST" action="{{ route('programs.update', $programs->id) }}" class="needs-validation" novalidate>
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label  class="form-label">Abbreviation</label>
        <input type="text" class="form-control" name="abbreviation" value="{{ $programs->abbreviation }}" placeholder="Enter Abbreviation">
    </div>

    <div class="mb-3">
        <label  class="form-label">Program Name</label>
        <input type="text" class="form-control" name="name" value="{{ $programs->name }}" placeholder="Program Name">
    </div>

    
        <div class="mb-3">
        <label class="control-label">Campuses</label>
        <select class="form-control select2" name="campus_id" required>
            @foreach ($campuses as $campus)
                <option value="{{ $campus->id }}" {{ $programs->campus_id == $campus->id ? 'selected' : '' }}>
                    {{ $campus->name }}
                </option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('campus_id')" class="mt-2" />
    </div>



    <div class="mb-3">
        <label  class="form-label">Description</label>
        <textarea class="form-control" name="description" value="{{ $programs->description }}" placeholder="Enter Description"></textarea>
    </div>

    <div>
        <button type="submit" class="btn btn-primary w-md">Submit</button>
    </div>
</form>