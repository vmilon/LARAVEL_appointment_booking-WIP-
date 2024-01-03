<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function index()
    {
        // Retrieve and display the list of appointments
        $appointments = Appointment::where('user_id', auth()->id())->get();
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        // Show the form to create a new appointment
        return view('appointments.create');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'date' => [
                'required',
                'date',
                'after_or_equal:now', // Ensure the appointment is in the future
                Rule::unique('appointments', 'date')->where(function ($query) use ($request) {
                    return $query
                        ->where('date', '>=', now()->toDateTimeString()) // Ensure the new appointment is in the future
                        ->whereNotIn('user_id', [auth()->id()]); // Exclude appointments of the authenticated user
                }),
                // Add any additional validation rules as needed
            ],
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ], [
            'date.unique' => 'The selected date and time are not available.',
            'fullname.required' => 'The fullname field is required.',
            'phone.required' => 'The phone field is required.',
            'email.required' => 'The email field is required.',
        ]);

        // Create a new appointment instance
        $appointment = new Appointment([
            'date' => $request->input('date'),
            'fullname' => $request->input('fullname'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'user_id' => auth()->id(),
        ]);

        // Save the appointment to the database
        $appointment->save();

        // Redirect back to the appointments index page with a success message
        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
    }


    public function edit(Appointment $appointment)
    {
        // Show the form to edit the existing appointment
        return view('appointments.edit', compact('appointment'));
    }

    public function update(Request $request, Appointment $appointment)
{
    $request->validate([
        'date' => 'required|date',
        
    ]);

    $appointment->update($request->all());

    return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
}


    public function destroy(Appointment $appointment)
    {
        // Delete the appointment
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }
}
