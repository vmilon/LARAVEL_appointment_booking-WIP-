@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Appointments</h2>
        
        <a href="{{ route('appointments.create') }}" class="btn btn-primary">Create Appointment</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Appointment ID</th>
                    <th>User Email</th>
                    <th>Date</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->id }}</td>
                        <td>{{ $appointment->user->email }}</td>
                        <td>{{ $appointment->date }}</td>
                        <td>
                            <a href="{{ route('appointments.edit', $appointment) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('appointments.destroy', $appointment) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
