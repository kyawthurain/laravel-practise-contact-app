@extends('dashboard.master')
@section('content')

    <h4>Edit a tag</h4>
    <div>
        <form action="{{ route('tag.update',$tag->id) }}" class=" form border rounded p-3" method="post">
            @csrf
            @method('put')
            <div>
                <label for="">Tag name</label>
                <input type="text" class=" form-control" name="tag_name" value="{{ old('tag_name',$tag->tag_name) }}">
            </div>

            <button class=" mt-3 btn btn-primary">Update</button>


        </form>
    </div>
@endsection