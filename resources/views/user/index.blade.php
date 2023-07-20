@extends('dashboard.master')

@section('content')
    

    <h4>View Users</h4>
    <div>
        <table class=" table">
            <thead>
                <th>Name</th>
                <th>Role</th>
                <th>Email</th>
                <th>Joined at</th>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('d M Y') }}</td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
        {{ $users->onEachSide(1)->links() }}
    </div>


@endsection