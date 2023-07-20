@extends('dashboard.master')
@section('content')

    <h4>Create new tag</h4>
    <div>
        <form action="{{ route('tag.store') }}" class=" form border rounded p-3" method="post">
            @csrf
            <div>
                <label for="">Tag name</label>
                <input type="text" class=" form-control" name="tag_name">
            </div>

            <button class=" mt-3 btn btn-primary">Create</button>


        </form>
    </div>
@endsection