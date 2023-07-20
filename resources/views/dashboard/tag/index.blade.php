@extends('dashboard.master')

@section('content')
    

    <h4>View Tags</h4>
    <div class=" my-3 d-flex justify-content-between">
        <div class="">
            <a href="{{ route('category.create') }}" class=" btn btn-primary">Create more Tags</a>
        </div>
    </div>
    <div>
        <table class=" table">
            <thead>
                <th>Name</th>
                <th>Created by</th>
                <th>Actions</th>
                <th>Created at</th>
                <th>Updated at</th>
            </thead>
            <tbody>
                @forelse ($tags as $tag)
                    <tr>
                        <td>{{ $tag->tag_name}}</td>
                        <td>
                            {{ $tag->user->name }}
                        </td>
                        <td>
                            <div class=" btn-group">

                                <a href="{{ route('tag.edit',$tag->id) }}" class=" btn btn-outline-primary btn-sm">
                                    <i class=" bi bi-pencil-fill"></i>
                                </a>
                            
                                <button form="destroyTagForm{{ $tag->id }}" class=" btn btn-outline-primary btn-sm">
                                    <i class=" bi bi-trash-fill"></i>
                                </button>

                                <form id="destroyTagForm{{ $tag->id }}" action="{{ route('tag.destroy',$tag->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                                
                            </div>
                        </td>
                        <td>{{ $tag->created_at }}</td>
                        <td>{{ $tag->updated_at }}</td>
                        
                    </tr>
                @empty
                    <tr class=" text-center">
                        <td class=" mt-3" colspan="3">
                        Here is nothing..... <br><span><a href="{{ route('tag.create') }}">create tags here</a></span>

                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{-- {{ $categories->onEachSide(1)->links() }} --}}
    </div>


@endsection