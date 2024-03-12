<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\View\View;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //show lists of courses
    {
        $courses = Course::latest()->paginate(5);
    
        return view('courses.index', compact('courses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'syllabus' => 'required',
            'duration' => 'required'
        ]);
    
        Course::create($request->all());
     
        return redirect()->route('courses.index')
                        ->with('success','Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $courses = Course::find($id);
        return view('courses.show')->with('courses', $courses);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::findOrFail($id);

    return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'syllabus' => 'required|string|max:255',
            'duration' => 'required|string|max:15',
        ]);

        // Find the student by ID
        $course = Course::findOrFail($id);

        // Update the student with the validated data
        $course->update($validatedData);

        // Redirect back to the student details page
        return redirect()->route('courses.show', $course->id)->with('flash_message', 'Course updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Course::destroy($id);
        return redirect('courses')->with('flash_message', 'Course deleted');
    
    }
}
