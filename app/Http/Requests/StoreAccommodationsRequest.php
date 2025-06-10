<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccommodationsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'accommodation_name' => 'required|string|max:255',
            'accommodation_type' => 'nullable|string|max:255',
            'accommodation_address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state_province' => 'string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'country'   => 'nullable|string|max:255',
            'longitude' => 'nullable|numeric|between:-180,180',
            'latitude'  => 'nullable|numeric|between:-90,90',
            'accommodation_registration_number' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'description'   => 'nullable|string',
            'amenities' => 'nullable|string',
            'thumbnail_image' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,svg,webp,avif,bmp,tiff,ico,heic,psd,ai',
                'max:4048',
            ],
        ];
    }

    public function messages(){
        return[
            'latitude.between'  => 'Latitude must be between -90 and 90 degrees.',
            'longitude.between' => 'Longitude must be between -180 and 180 degrees.',
            'star_rating.between' => 'Star rating must be between 1 and 5.',
            'thumbnail_image.dimensions' => 'The image dimensions must not exceed 800x400 pixels.',
            'check_in_time.date_format'  => 'Check-in time must be in HH:MM format.',
            'check_out_time.date_format' => 'Check-out time must be in HH:MM format.',
        ];
    }
}
