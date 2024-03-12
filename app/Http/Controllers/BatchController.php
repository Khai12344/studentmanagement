<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Course;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batches = Batch::latest()->paginate(5);
    
        return view('batches.index', compact('batches'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::pluck('name', 'id');
        return view('batches.create', compact('courses')); //for dropdown
    }

    /**
     * Store a newly created resource in storage.
     */
    /* public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'course_id' => 'required',
            'start_date' => 'required'
        ]);
    
        Batch::create($request->all());
     
        return redirect()->route('batches.index')
                        ->with('success','Batch created successfully.');
    
    } */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'course_id' => 'required|exists:courses,id', // Ensure that course_id exists in the "courses" table
        'start_date' => 'required'
    ]);

    try {
        Batch::create($request->all());
     
        return redirect()->route('batches.index')->with('success', 'Batch created successfully.');
    } catch (ModelNotFoundException $e) {
        return redirect()->back()->with('error', 'Course not found. Please select a valid course.');
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $batches = Batch::find($id);
        return view('batches.show')->with('batches', $batches);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $batch = Batch::findOrFail($id);

        return view('batches.edit', compact('batch'));
    }

    /**
     * Update the specified resource in storage.
     */
    /* public function update(Request $request, string $id)
    {
         // Validate the form data
         $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'course_id' => 'required',
            'start_date' => 'required',
        ]);

        // Find the student by ID
        $batch = Batch::findOrFail($id);

        // Update the student with the validated data
        $batch->update($validatedData);

        // Redirect back to the student details page
        return redirect()->route('batches.show', $batch->id)->with('flash_message', 'Batch updated successfully!');
    } */
    public function update(Request $request, string $id)
{
    
    // Validate the form data
    $request->validate([
        'name' => 'required|string|max:255',
        'course_id' => 'required|exists:courses,id', // Ensure that course_id exists in the "courses" table
        'start_date' => 'required',
    ]);

    try {
        // Find the batch by ID
        $batch = Batch::findOrFail($id);

        // Update the batch with the validated data
        $batch->update($request->all());

        // Redirect back to the batch details page
        return redirect()->route('batches.show', $batch->id)->with('flash_message', 'Batch updated successfully!');
    } catch (ModelNotFoundException $e) {
        return redirect()->back()->with('error', 'Course not found. Please select a valid course.');
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Batch::destroy($id);
        return redirect('batches')->with('flash_message', 'Batch deleted');
    }
}
