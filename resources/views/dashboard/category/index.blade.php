@extends('dashboard.master')

@section('content')
    

    <h4>View Categories</h4>
    <div class=" my-3 d-flex justify-content-between">
        <div class="">
            <a href="{{ route('category.create') }}" class=" btn btn-primary">Create more categories</a>
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
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->user->name }}</td>
                        <td>
                            <div class=" btn-group">
                                <a href="{{ route('category.edit',$category->id) }}" class=" btn btn-outline-primary btn-sm">
                                    <i class=" bi bi-pencil-fill"></i>
                                </a>
                                
                                <button form="destroycategoryForm{{ $category->id }}" class=" btn btn-outline-primary btn-sm">
                                    <i class=" bi bi-trash-fill"></i>
                                </button>

                                <form id="destroycategoryForm{{ $category->id }}" action="{{ route('category.destroy',$category->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                                
                            </div>
                        </td>
                        <td>{{ $category->created_at }}</td>
                        <td>{{ $category->updated_at }}</td>
                        
                    </tr>
                @empty
                    <tr class=" text-center">
                        <td class=" mt-3" colspan="3">
                        Here is nothing..... <br><span><a href="{{ route('category.create') }}">create categories here</a></span>

                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{-- {{ $categories->onEachSide(1)->links() }} --}}
    </div>


@endsection