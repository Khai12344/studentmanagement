<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Student;
use Illuminate\View\View;


class StudentController extends Controller {

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $students = Student::latest()->paginate(5);
    
        return view('students.index', compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');  //when clicking create button in student
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
    
        Student::create($request->all());
     
        return redirect()->route('students.index')
                        ->with('success','Student created successfully.');
    }
        
    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $students = Student::find($id);
        return view('students.show')->with('students', $students);  //to show the students detail
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $student = Student::findOrFail($id);

    return view('students.edit', compact('student'));
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
        $student = Student::findOrFail($id);

        // Update the student with the validated data
        $student->update($validatedData);

        // Redirect back to the student details page
        return redirect()->route('students.show', $student->id)->with('flash_message', 'Student updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Student::destroy($id);
        return redirect('students')->with('flash_message', 'Student deleted');
    }
}
