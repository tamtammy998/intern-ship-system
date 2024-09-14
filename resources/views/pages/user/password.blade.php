<form method="POST" action="{{ route('user.update_password', $users->id) }}" class="needs-validation" novalidate>
@csrf
@method('PUT')
    <div class="mb-3">
        <label  class="form-label"> Password </label>
        <input type="password" name="password"  class="form-control" placeholder="Enter Password" required>
    </div>

    <div class="mb-3">
        <label  class="form-label"> Confirm Password </label>
        <input type="password" name="password_confirmation"  class="form-control" placeholder="Confirm Password" required>
    </div>

    <div>
        <button type="submit" class="btn btn-primary w-md">Submit</button>
    </div>
</form>