<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateAdRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "type" => 'required|in:free,paid',
            "title" => 'required',
            "description" => 'required',
            "start_date" => 'required|date_format:Y-m-d|after:tomorrow',
            "advertiser_id" => 'required',
            "category_id" => 'required',
        ];
    }
}
