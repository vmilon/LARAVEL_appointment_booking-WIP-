@extends('layouts.app')

@section('content')

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


    <div class="container">
        <h2>Create Appointment</h2>
        
        
        <form action="{{ route('appointments.store') }}" method="POST">
            @csrf


            <div class="form-group">
                <label for="date">Appointment Date and Time:</label>
                <input type="text" id="date" name="date" class="form-control" required>
            </div>

            <script>
                flatpickr("#date", {
                    enableTime: true,
                    dateFormat: "Y-m-d H:i",
                    minDate: "today",
                    maxDate: new Date().fp_incr(60), // 60 days from now
                    minTime:'09:00',
                    maxTime:'17:00',
                    time_24hr: true,
                    minuteIncrement: 60
                });
            </script>

            <div class="form-group">
                <label for="fullname">Full Name:</label>
                <input type="text" id="fullname" name="fullname" class="form-control" value="{{ auth()->user()->name }}" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ auth()->user()->phone }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ auth()->user()->email }}" required>
            </div>

            <!-- Add any additional fields as needed for your appointment creation form -->
            <br>

            <button type="submit" class="btn btn-success">Create</button>
            <br><br>

            @if($errors->has('date'))
                <span class="text-danger">{{ $errors->first('date') }}</span>
            @endif
        </form>
    </div>
@endsection
