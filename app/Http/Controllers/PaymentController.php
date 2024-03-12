<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Barryvdh\DomPDF\PDF;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::latest()->paginate(5);
    
        return view('payments.index', compact('payments'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $enrollments = Enrollment::pluck('enroll_no', 'id');
        return view('payments.create', compact('enrollments')); //for dropdown
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'paid_date' => 'required',
            'enroll_id' => 'required|exists:enrollments,id', // Ensure that enroll_id exists in the "enrollments" table
            'amount' => 'required'
        ]);
    
        try {
            Payment::create($request->all());
         
            return redirect()->route('payments.index')->with('success', 'Payment created successfully.');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Enrollment not found. Please select a valid enrollement number.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payments = Payment::find($id);
        return view('payments.show')->with('payments', $payments);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment = Payment::findOrFail($id);

        return view('payments.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Validate the form data
    $request->validate([
        'paid_date' => 'required|string|max:255',
        'enroll_id' => 'required|exists:courses,id', // Ensure that course_id exists in the "courses" table
        'amount' => 'required',
    ]);

    try {
        // Find the batch by ID
        $payment = Payment::findOrFail($id);

        // Update the batch with the validated data
        $payment->update($request->all());

        // Redirect back to the batch details page
        return redirect()->route('payments.show', $payment->id)->with('flash_message', 'Payment updated successfully!');
    } catch (ModelNotFoundException $e) {
        return redirect()->back()->with('error', 'Enrollment not found. Please select a valid enrollment.');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Payment::destroy($id);
        return redirect('payments')->with('flash_message', 'Payment deleted');
    }

}
