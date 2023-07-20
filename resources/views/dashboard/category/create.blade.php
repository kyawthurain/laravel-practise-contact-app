@extends('dashboard.master')
@section('content')

    <h4>Create Category</h4>
    <div>
        <form action="{{ route('category.store') }}" class=" form border rounded p-3" method="post">
            @csrf
            <div>
                <label for="">Category name</label>
                <input type="text" class=" form-control" name="category_name">
            </div>

            <button class=" mt-3 btn btn-primary">Create</button>


        </form>
    </div>
@endsection