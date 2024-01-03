@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Yoltlabs Appointment Booking<br><br></div>

                    <div class="card-body">
                        <p>Welcome to our Appointment Booking System. Our platform allows you to manage your appointments efficiently.</p>

                        <p>You can create, edit, and delete appointments based on your schedule. Click the button below to view your appointments:<br><br></p>

                        <a href="{{ route('appointments.index') }}" class="btn btn-primary" style="font-weight: bold; text-decoration: underline;">View Appointments</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
