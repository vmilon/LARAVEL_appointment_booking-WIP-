@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 style=text-align:center;>Appointments<br><br></h2>

        <p>Below you can see your appointments. You can also choose to create new appointments or edit/delete your existing ones.<br><br></p>
        
        <a href="{{ route('appointments.create') }}" class="btn btn-primary">Create Appointment</a>

        <table class="table mt-3" style=width:100%>
            <thead>
                <tr>
                    <th>Appointment ID</th>
                    
                    <th>Date</th>
                    
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->id }}</td>
                        
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
