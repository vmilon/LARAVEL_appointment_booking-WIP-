<!-- resources/views/profiles/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Profile</h2>

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PATCH')

            <!-- Include form fields for updating the user profile -->
            <!-- For example: -->
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ $user->name }}" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ $user->email }}" required>

            <!-- Add more fields as needed -->

            <button type="submit">Update Profile</button>
        </form>
    </div>
@endsection

