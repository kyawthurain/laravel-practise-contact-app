<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
     $id = request()->contact->id;
    //  dd($id);
        return [
            "contact_name" => 'required|min:3|max:30',
            "contact_phone" => 'required|min:5|max:20',
            'contact_address' => 'required|min:10|max:300',
            "contact_email" => "required|email|unique:contacts,contact_email,$id",
            "contact_thumbnail" => "nullable|string",
            "contact_gender" => 'required|in:male,female,other',
            'user_id' => 'exists:users,id',
            'contact_favorite' => 'nullable|in:yes,no',
        ];
    }
}
