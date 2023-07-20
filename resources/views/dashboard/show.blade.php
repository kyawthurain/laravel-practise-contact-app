@extends('dashboard.master')
@section('content')
    
<div class=" d-flex align-items-center justify-content-between">
    <div>
        <h4>Contact Detail</h4>
    </div>
    <div>

        @can('admin-only')
         <p>User : <span class=" fw-bold">{{ $contact->user->name }}</span></p>
        @endcan
    </div>
</div>
    
    <div class=" mt-3">
        <table class=" table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <td>{{ $contact->contact_name }}
                        @if ($contact->contact_favorite === 'yes')
                        <span><i class=" ms-2 bi bi-heart-fill text-danger"></i></span>
                    @else
                        
                    @endif</td>
                </tr>

                <tr>
                    <th>Nickname</th>
                    <td>null</td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>{{ $contact->contact_email }}</td>
                </tr>

                <tr>
                    <th>Gender</th>
                    <td>{{ $contact->contact_gender }}</td>
                </tr>

                <tr>
                    <th>Phone Number</th>
                    <td>{{ $contact->contact_phone }}</td>
                </tr>

                
                <tr>
                    <th>Address</th>
                    <td>{{ $contact->contact_address }}</td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>{{ $contact->category->category_name }}</td>
                </tr>
                <tr>
                    <th>Created at</th>
                    <td>{{ $contact->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated at</th>
                    <td>{{ $contact->updated_at }}</td>
                </tr>
            </thead>
        </table>

    </div>
@endsection
