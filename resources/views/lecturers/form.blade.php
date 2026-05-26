<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control"
        value="{{ old('name', $lecturer->name ?? '') }}">
    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
</div>

<div class="mb-3">
    <label>Staff ID</label>
    <input type="text" name="staff_id" class="form-control"
        value="{{ old('staff_id', $lecturer->staff_id ?? '') }}">
    @error('staff_id') <small class="text-danger">{{ $message }}</small> @enderror
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control"
        value="{{ old('email', $lecturer->email ?? '') }}">
    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
</div>
