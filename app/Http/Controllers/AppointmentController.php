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
                $query->where('user_id', auth()->id());
            }),
            // Add any additional validation rules as needed
        ],
        'fullname' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'required|email|max:255',
        'date_end' => 'required|date|after_or_equal:date', // Assuming you have an 'end' date for the appointment
    ], [
        'date.unique' => 'The selected date and time are not available.',
        'date_end.after_or_equal' => 'The end date must be equal to or after the start date.',
        'date_end.required' => 'The end date is required.', // Customize the message as needed
        'date_end.date' => 'Invalid date format for the end date.', // Customize the message as needed
        'date_end.after_or_equal' => 'The end date must be equal to or after the start date.', // Customize the message as needed
        'fullname.required' => 'The fullname field is required.', // Customize the message as needed
        'phone.required' => 'The phone field is required.', // Customize the message as needed
        'email.required' => 'The email field is required.', // Customize the message as needed
    ]);

    // Create a new appointment instance
    $appointment = new Appointment([
        'date' => $request->input('date'),
        'date_end' => $request->input('date_end'),
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
