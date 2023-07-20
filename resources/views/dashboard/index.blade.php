@extends('dashboard.master')

@section('content')
    

    <h4>View Contacts</h4>
    <div class=" my-3 d-flex justify-content-between">
        <div class="">
            <a href="{{ route('contact.create') }}" class=" btn btn-primary">Create more contacts</a>
        </div>
        <div class=" d-flex align-items-center">
            
            <div class=" me-2">
                <a href="{{ route('contact.index',['name' => 'asc']) }}">asc</a>
            <a href="{{ route('contact.index',['name' => 'desc']) }}">desc</a>
            <a href="{{ route('contact.index') }}">default</a>
            </div>

            <div>
                <form action="" class="" method="get">
                    <div class=" input-group">
                        <input type="text" name="q" class=" form-control" placeholder="Search here" value="{{ request()->q }}">
                        <a href="{{ route('contact.index') }}" class=" btn btn-outline-danger">x</a>
                    <button class=" btn btn-primary">
                        <i class=" bi bi-search"></i>
                    </button>
                    </div>
                </form>
            </div>
 
           
        </div>
    </div>
    <div>
        <table class=" table">
            <thead>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                @can('admin-only')
                    <th>Owner</th>
                @endcan
                <th>Actions</th>
            </thead>
            <tbody>
                @forelse ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->contact_name }}</td>
                        <td>{{ $contact->contact_phone }}</td>
                        <td>{{ $contact->contact_email }}</td>
                        @can('admin-only')
                    <td>{{ $contact->user->name }}</td>
                    @endcan
                        <td>
                            <div class=" btn-group">
                                <a href="{{ route('contact.show',$contact->id) }}" class=" btn btn-outline-primary btn-sm">
                                    <i class="bi bi-info-lg"></i>
                                </a>
                                <a href="{{ route('contact.edit',$contact->id) }}" class=" btn btn-outline-primary btn-sm">
                                    <i class=" bi bi-pencil-fill"></i>
                                </a>
                                
                                <button form="destroyContactForm{{ $contact->id }}" class=" btn btn-outline-primary btn-sm">
                                    <i class=" bi bi-trash-fill"></i>
                                </button>

                                <form id="destroyContactForm{{ $contact->id }}" action="{{ route('contact.destroy',$contact->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                                
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class=" text-center">
                        <td class=" mt-3" colspan="3">
                        Here is nothing..... <br><span><a href="{{ route('contact.create') }}">create contacts here</a></span>

                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $contacts->onEachSide(1)->links() }}
    </div>


@endsection