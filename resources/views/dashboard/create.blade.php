@extends('dashboard.master')
@section('content')
@php
  $genders = ['male', 'female', 'other'];
@endphp

    <h4>Create New Contact</h4>

    <form id="createContactForm" action="{{ route('contact.store') }}" method="post">
        @csrf
    </form>



    <div class=" row border rounded p-3">
        <div class=" col-lg-8">

            <div class=" mb-3">
                <label for="" class=" form-label">Name</label>
                <input form="createContactForm" type="text" name="contact_name" class=" form-control @error('contact_name') is-invalid @enderror ">
                @error('contact_name')
                     <div class=" invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
        
        
            <div class=" mb-3">
                <label for="" class=" form-label">Phone Number</label>
                <input form="createContactForm" type="text" name="contact_phone" class=" form-control @error('contact_phone') is-invalid @enderror ">
                @error('contact_phone')
                <div class=" invalid-feedback"> {{ $message }} </div>
                 @enderror
            </div>
        
            <div class=" mb-3">
                <label for="" class=" form-label">Email</label>
                <input form="createContactForm" type="email" name="contact_email" class=" form-control @error('contact_email') is-invalid @enderror ">
                @error('contact_email')
                <div class=" invalid-feedback"> {{ $message }} </div>
           @enderror
            </div>
        
            <div class=" mb-3">
                <label for="" class=" form-label">Address</label>
                <textarea form="createContactForm" class=" form-control @error('contact_address') is-invalid @enderror" name="contact_address" id="" cols="30" rows="5"></textarea>
                @error('contact_address')
                <div class=" invalid-feedback"> {{ $message }} </div>
           @enderror
            </div>
            
        </div>
        
        <div class=" col-lg-4">
            
            <div class=" mb-3">
                <label for="">Thumbnail photo link</label>
                <input type="text" name="contact_thumbnail" id="" form="createContactForm" class=" form-control @error('contact_thumbnail') is-invalid @enderror">
                @error('contact_thumbnail')
                <div class=" invalid-feedback"> {{ $message }} </div>
           @enderror
            </div>

            <div class=" mb-3">
                <label for="" class=" form-label me-2">Gender</label>
               
                @foreach ($genders as $gender)
                <div class=" form-check form-check-inline">
                  <input form="createContactForm" class="form-check-input @error('contact_gender') is-invalid @enderror" type="radio" name="contact_gender" id="gender_{{ $gender }}" value="{{ $gender }}">
                  <label class="form-check-label" for="gender_{{ $gender }}">
                    {{ $gender }}
                  </label>
                </div>
                @endforeach

                  @error('contact_gender')
                  <div class=" invalid-feedback"> {{ $message }} </div>
             @enderror
            </div>


               <div>
                <label for="" class=" fotm-label mb-3">Add to favorites?</label>
                <div class="form-check ms-3 form-check-inline">
                    <input class="form-check-input  @error('contact_favorite') is-invalid @enderror" form="createContactForm" type="radio" value="yes" name="contact_favorite" id="contact_favorite_yes">
                    <label class="form-check-label" for="contact_favorite_yes">
                        yes
                    </label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input @error('contact_favorite') is-invalid @enderror" form="createContactForm" type="radio" value="no" name="contact_favorite" id="contact_favorite_no">
                    <label class="form-check-label" for="contact_favorite_no">
                        no
                    </label>
                  </div>
                        @error('contact_favorite')
                  <div class=" invalid-feedback"> {{ $message }} </div>
                        @enderror
               </div>
           
               <div class=" mb-3">
                    <select name="category_id" id="" class=" form-select @error('category_id') is-invalid @enderror" form="createContactForm">
                        
                        @foreach (App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach

                    </select>

                    @error('category_id')
                    <div class=" invalid-feedback"> {{ $message }} </div>
                          @enderror
               </div>

               <div>
                <label for="" class=" form-label">Choose Tags</label>
                   @foreach (App\Models\Tag::all() as $tag)
                   <div class="form-check">
                            <input form="createContactForm" class="form-check-input @error('tags') is-invalid @enderror" name="tags[]" type="checkbox" value="{{ $tag->id }}" id="tagId_{{ $tag->id }}">
                            <label class="form-check-label" for="tagId_{{ $tag->id }}">
                            {{ $tag->tag_name }}
                            </label>
                        </div>
                        @endforeach

                        @error('tags')
                        <div class=" invalid-feedback"> {{ $message }} </div>
                              @enderror

               </div>
            
                <div class=" w-100">
                    <a href="{{ route('contact.index') }}" class=" mb-3 d-inline-block w-100 btn btn-outline-secondary text-black">Cancel</a>
                <button class=" d-inline-block w-100 btn btn-primary" form="createContactForm">Save Contact</button>
                </div>
        </div>
    </div>
@endsection