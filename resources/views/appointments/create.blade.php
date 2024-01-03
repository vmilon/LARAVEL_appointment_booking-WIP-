@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Appointment</h2>
        
        <form action="{{ route('appointments.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="date">Appointment Date and Time:</label>
                <input type="datetime-local" id="date" name="date" class="form-control" required>
            </div>

            <!-- Add any additional fields as needed for your appointment creation form -->

            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
@endsection
