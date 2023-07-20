@extends('dashboard.master')
@section('content')
    <h4>Categorized Contacts</h4>
    <div class=" container border rounded py-3">
        <div class=" row g-3">
            
            @forelse (App\Models\Category::all() as $category)
            <div class=" col-6 col-md-6">
                <a class=" btn btn-outline-dark w-100 p-3" href="{{ route('categorizedShow',$category->id) }}">{{ $category->category_name }}</a>
            </div>
            @empty
                <div class="text-center">
                    <h3>There is no category yet</h3>
                </div>
            @endforelse
            

        </div>
    </div>
@endsection