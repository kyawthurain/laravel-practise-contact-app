@extends('dashboard.master')

@section('content')
    

    <h4>View Users</h4>
    <div>
        <table class=" table">
            <thead>
                <th>Name</th>
                <th>Role</th>
                <th>Contacts count</th>
                <th>Category count</th>
                <th>Tags count</th>
                <th>Media count</th>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            {{ $user->contacts->count('id') }}
                            
                        </td>
                        <td>{{ $user->categories->count('id') }}</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
        {{ $users->onEachSide(1)->links() }}
    </div>


@endsection