@extends('dashboard.master')
@section('content')
@php
  $genders = ['male', 'female', 'other'];
@endphp

    <h4>Edit Contact</h4>

    <form id="updateContactForm" action="{{ route('contact.update',$contact->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
    </form>



    <div class=" row border rounded p-3">
        <div class=" col-lg-8">

            <div class=" mb-3">
                <label for="" class=" form-label">Name</label>
                <input value="{{ old('contact_name',$contact->contact_name) }}" form="updateContactForm" type="text" name="contact_name" class=" form-control @error('contact_name') is-invalid @enderror ">
                @error('contact_name')
                     <div class=" invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
        
        
            <div class=" mb-3">
                <label for="" class=" form-label">Phone Number</label>
                <input value="{{ old('contact_phone',$contact->contact_phone) }}" form="updateContactForm" type="text" name="contact_phone" class=" form-control @error('contact_phone') is-invalid @enderror ">
                @error('contact_phone')
                <div class=" invalid-feedback"> {{ $message }} </div>
                 @enderror
            </div>
        
            <div class=" mb-3">
                <label for="" class=" form-label">Email</label>
                <input value="{{ old('contact_email',$contact->contact_email) }}" form="updateContactForm" type="email" name="contact_email" class=" form-control @error('contact_email') is-invalid @enderror ">
                @error('contact_email')
                <div class=" invalid-feedback"> {{ $message }} </div>
           @enderror
            </div>
        
            <div class=" mb-3">
                <label for="" class=" form-label">Address</label>
                <textarea form="updateContactForm" class=" form-control @error('contact_address') is-invalid @enderror" name="contact_address" id="" cols="30" rows="5">{{ old('contact_address',$contact->contact_address) }}</textarea>
                @error('contact_address')
                <div class=" invalid-feedback"> {{ $message }} </div>
           @enderror
            </div>
            
        </div>
        
        <div class=" col-lg-4">
            
            <div class=" mb-3">
                <label for="">Thumbnail photo</label>
                <input type="file" name="contact_thumbnail" id="" form="updateContactForm" class=" form-control @error('contact_thumbnail') is-invalid @enderror">
                @error('contact_thumbnail')
                <div class=" invalid-feedback"> {{ $message }} </div>
           @enderror
            </div>

            <div class=" mb-3">
                <label for="" class=" form-label me-2">Gender</label>

                @foreach ($genders as $gender)
                <div class=" form-check form-check-inline">
                  <input
                  {{ old('contact_gender',$contact->contact_gender) == $gender ? "checked" : "" }}
                   form="updateContactForm" class="form-check-input @error('contact_gender') is-invalid @enderror" type="radio" name="contact_gender" id="gender_{{ $gender }}" value="{{ $gender }}">
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
                <label for="" class=" mb-3">Add to favorites?</label>

            <div class="form-check ms-3 form-check-inline">
                <input
                @if ($contact->contact_favorite === 'yes')
                    checked
                @endif
                 class="form-check-input @error('contact_favorite') is-invalid @enderror" form="updateContactForm" type="radio" value="yes" name="contact_favorite" id="contact_favorite_yes">
                <label class="form-check-label" for="contact_favorite_yes">
                    yes
                </label>
              </div>

              <div class="form-check form-check-inline">
                <input
                @if ($contact->contact_favorite === 'no')
                    checked
                @endif
                 class="form-check-input @error('contact_favorite') is-invalid @enderror" form="updateContactForm" type="radio" value="no" name="contact_favorite" id="contact_favorite_no">
                <label class="form-check-label" for="contact_favorite_no">
                    no
                </label>
              </div>

              @error('contact_favorite')
              <div class=" invalid-feedback"> {{ $message }} </div>
          @enderror
            </div>

            <div class=" mb-3">
                <select name="category_id" id="" class=" form-select @error('category_id') is-invalid @enderror" form="updateContactForm">
                    
                    @foreach (App\Models\Category::all() as $category)
                        <option {{ $contact->category_id == $category->id ? 'selected' : '' }}
                         value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach

                </select>

                @error('category_id')
                <div class=" invalid-feedback"> {{ $message }} </div>
                      @enderror
           </div>

            <button class=" btn d-block w-100 btn-primary" form="updateContactForm">Update Contact</button>
        </div>
    </div>
@endsection