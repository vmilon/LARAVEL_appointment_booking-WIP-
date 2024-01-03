<?php

namespace App\Http\Controllers;

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
        // Validate and store the new appointment
        // Don't forget to handle date overlapping validation
    }

    public function edit(Appointment $appointment)
    {
        // Show the form to edit the existing appointment
        return view('appointments.edit', compact('appointment'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        // Validate and update the appointment
        // Don't forget to handle date overlapping validation
    }

    public function destroy(Appointment $appointment)
    {
        // Delete the appointment
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }
}
