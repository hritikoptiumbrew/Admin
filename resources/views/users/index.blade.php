<!-- resources/views/users/index.blade.php -->

@extends('layouts.app') <!-- Assuming you have a master layout, adjust as needed -->

@section('content')
    <div class="container">
        <h1>User List</h1>

        @if(count($users) > 0)
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <!-- Add more fields as needed -->
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <!-- Add more fields as needed -->
                        <td>
                            <a href="{{ route('show', ['id' => $user->id]) }}" class="btn btn-info">View</a>
                            <a href="{{ route('edit', ['id' => $user->id]) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('destroy', ['id' => $user->id]) }}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>No users found.</p>
        @endif
    </div>
@endsection
