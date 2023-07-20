
    <h3>Dashboard</h3>
    <ul class=" list-group">
        <a href="{{ route('dashboard.index') }}" class=" list-group-item list-group-item-action">
            Home
        </a>
    </ul>
    <div class=" mt-3">
        <h4>Manage Contacts</h4>
        <ul class=" list-group">
            <a href="{{ route('contact.create') }}" class=" list-group-item list-group-item-action">
                Create contacts
            </a>

            <a href="{{ route('contact.index') }}" class=" list-group-item list-group-item-action">
                View contacts
            </a>

            <a href="{{ route('indexFav') }}" class=" list-group-item list-group-item-action">
                View favorites
            </a>

            <a href="{{ route('categorizedIndex') }}" class=" list-group-item list-group-item-action">
                Catogerized contacts
            </a>

        </ul>
    </div>

    <div class=" mt-3">
        <h4>Media</h4>
        <ul class=" list-group">
            <a href="" class=" list-group-item list-group-item-action">
                View gallery
            </a>

            <a href="" class=" list-group-item list-group-item-action">
                Add to gallery
            </a>

        </ul>
    </div>
    <hr>
   

    @can('admin-only')
    <h2 class=" mt-3">
        Adminstrator session
    </h2>
    <hr>

    <div class=" mt-3">
        <h4>Users</h4>
        <ul class=" list-group">
            <a href="{{ route('userIndex') }}" class=" list-group-item list-group-item-action">
                view users
            </a>

            <a href="{{ route('userIndexAll') }}" class=" list-group-item list-group-item-action">
                view users' property
            </a>
            
        </ul>
    </div>
    
    <div class=" mt-3">
        <h4>Manage Categories</h4>
        <ul class=" list-group">
            <a href="{{ route('category.create') }}" class=" list-group-item list-group-item-action">
                Create categories
            </a>

            <a href="{{ route('category.index') }}" class=" list-group-item list-group-item-action">
                View categories
            </a>

        </ul>
    </div>

    <div class=" mt-3">
        <h4>Manage Tags</h4>
        <ul class=" list-group">
            <a href="{{ route('tag.create') }}" class=" list-group-item list-group-item-action">
                create tags
            </a>

            <a href="{{ route('tag.index') }}" class=" list-group-item list-group-item-action">
                view tags
            </a>

        </ul>
    </div>
    @endcan


