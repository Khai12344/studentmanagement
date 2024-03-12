<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Student;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrollments = Enrollment::latest()->paginate(5);
    
        return view('enrollments.index', compact('enrollments'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $batches = Batch::pluck('name', 'id');
        $students = Student::pluck('name', 'id');
        return view('enrollments.create', compact('batches', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'enroll_no' => 'required',
            'batch_id' => 'required|exists:batches,id',
            'student_id' => 'required|exists:students,id',
            'join_date' => 'required|date',
            'fee' => 'required|numeric',
        ], [
            'batch_id.exists' => 'The selected batch does not exist.',
            'student_id.exists' => 'The selected student does not exist.',
        ]);
    
        // If validation passes, create a new enrollment
        Enrollment::create([
            'enroll_no' => $request->enroll_no,
            'batch_id' => $request->batch_id,
            'student_id' => $request->student_id,
            'join_date' => $request->join_date,
            'fee' => $request->fee,
        ]);
    
        // Redirect to the index view after successful creation
        return redirect()->route('enrollments.index')->with('success', 'Enrollment added successfully.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $enrollments = Enrollment::find($id);
        return view('enrollments.show')->with('enrollments', $enrollments);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $enrollment = Enrollment::findOrFail($id);

        return view('enrollments.edit', compact('enrollment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'enroll_no' => 'required',
        'batch_id' => 'required|exists:batches,id',
        'student_id' => 'required|exists:students,id',
        'join_date' => 'required|date',
        'fee' => 'required|numeric',
    ], [
        'batch_id.exists' => 'The selected batch does not exist.',
        'student_id.exists' => 'The selected student does not exist.',
    ]);

    // Find the enrollment record by ID
    $enrollment = Enrollment::findOrFail($id);

    // Update the enrollment data
    $enrollment->update([
        'enroll_no' => $request->enroll_no,
        'batch_id' => $request->batch_id,
        'student_id' => $request->student_id,
        'join_date' => $request->join_date,
        'fee' => $request->fee,
    ]);

    // Redirect to the index view after successful update
    return redirect()->route('enrollments.index')->with('success', 'Enrollment updated successfully.');
        
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Enrollment::destroy($id);
        return redirect('enrollments')->with('flash_message', 'Enrollment deleted');
    }
}
