@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Appointment</h2>
        
        <form action="{{ route('appointments.update', $appointment) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="date">Appointment Date and Time:</label>
                <input type="datetime-local" id="date" name="date" class="form-control" value="{{ $appointment->date }}" required>
            </div>

            <!-- Add any additional fields as needed for your appointment editing form -->

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
