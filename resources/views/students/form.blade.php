<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control"
        value="{{ old('name', $student->name ?? '') }}">
    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
</div>

<div class="mb-3">
    <label>Matric No</label>
    <input type="text" name="matric_no" class="form-control"
        value="{{ old('matric_no', $student->matric_no ?? '') }}">
    @error('matric_no') <small class="text-danger">{{ $message }}</small> @enderror
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control"
        value="{{ old('email', $student->email ?? '') }}">
    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
</div>