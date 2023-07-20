@extends('dashboard.master')
@section('content')

    <h4>Edit Category</h4>
    <div>
        <form action="{{ route('category.update',$category->id) }}" class=" form border rounded p-3" method="post">
            @csrf
            @method('put')
            <div>
                <label for="">Category name</label>
                <input type="text" class=" form-control @error('category_name') is-invalid @enderror" name="category_name" value="{{ old('category_name',$category->category_name) }}">
                 @error('category_name')
                     <div class=" invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
            

            <button class=" mt-3 btn btn-primary">Update</button>


        </form>
    </div>
@endsection