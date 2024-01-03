<!-- resources/views/profiles/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Profile<br><br></h2>

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PATCH')

            <!-- Include form fields for updating the user profile -->
            <!-- For example: -->
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ $user->name }}" required>

            <br><br>

            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ $user->email }}" required>

            <br><br>

            <label for="phone">Phone:</label>
            <input type="text" name="phone" value="{{ $user->phone }}" required> 

            <br><br>

            <label for="fullname">Full Name:</label>
            <input type="text" name="fullname" value="{{ $user->fullname }}" required>
            
            <br><br>

            <button type="submit" class="btn btn-primary">Update Profile</button>
            <br>

            <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Back to Appointments</a>
            <br><br>

            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            
        </form>
    </div>
@endsection

