<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function index()
    {
        return view('lecturers.index', [
            'lecturers' => Lecturer::all()
        ]);
    }

    public function create()
    {
        return view('lecturers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'staff_id' => 'required|string|unique:lecturers',
            'email' => 'required|email|unique:lecturers',
        ]);

        Lecturer::create($validated);

        return redirect()->route('lecturers.index')
            ->with('success', 'Lecturer created successfully');
    }

    public function edit(Lecturer $lecturer)
    {
        return view('lecturers.edit', compact('lecturer'));
    }

    public function update(Request $request, Lecturer $lecturer)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'staff_id' => 'required|string|unique:lecturers,staff_id,' . $lecturer->id,
            'email' => 'required|email|unique:lecturers,email,' . $lecturer->id,
        ]);

        $lecturer->update($validated);

        return redirect()->route('lecturers.index')
            ->with('success', 'Lecturer updated successfully');
    }

    public function destroy(Lecturer $lecturer)
    {
        $lecturer->delete();

        return redirect()->route('lecturers.index')
            ->with('success', 'Lecturer deleted successfully');
    }
}
