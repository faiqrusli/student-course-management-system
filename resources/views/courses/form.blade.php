<div class="mb-3">
    <label>Code</label>
    <input type="text" name="code" class="form-control"
        value="{{ old('code', $course->code ?? '') }}">
    @error('code') <small class="text-danger">{{ $message }}</small> @enderror
</div>

<div class="mb-3">
    <label>Title</label>
    <input type="text" name="title" class="form-control"
        value="{{ old('title', $course->title ?? '') }}">
    @error('title') <small class="text-danger">{{ $message }}</small> @enderror
</div>

<div class="mb-3">
    <label>Credit Hour</label>
    <input type="number" name="credit_hour" class="form-control"
        value="{{ old('credit_hour', $course->credit_hour ?? '') }}">
    @error('credit_hour') <small class="text-danger">{{ $message }}</small> @enderror
</div>
