<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Teacher;
use Illuminate\View\View;


class TeacherController extends Controller {

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $teachers = Teacher::latest()->paginate(5);
    
        return view('teachers.index', compact('teachers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teachers.create');  //when clicking create button in student
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'mobile' => 'required'
        ]);
    
        Teacher::create($request->all());
     
        return redirect()->route('teachers.index')
                        ->with('success','Teacher created successfully.');
    }
        
    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $teachers = Teacher::find($id);
        return view('teachers.show')->with('teachers', $teachers);  //to show the students detail
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $teacher = Teacher::findOrFail($id);

    return view('teachers.edit', compact('teacher'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
        ]);

        // Find the student by ID
        $teacher = Teacher::findOrFail($id);

        // Update the student with the validated data
        $teacher->update($validatedData);

        // Redirect back to the student details page
        return redirect()->route('teachers.show', $teacher->id)->with('flash_message', 'Teacher updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Teacher::destroy($id);
        return redirect('teachers')->with('flash_message', 'Teacher deleted');
    }
}
