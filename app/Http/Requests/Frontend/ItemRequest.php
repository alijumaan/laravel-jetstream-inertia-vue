<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nomenclature' => ['required'],
            'sku' => ['required', 'max:30'],
            'part' => ['required', 'max:30'],
            'color' => ['required'],
            'size' => ['required'],
            'quantity' => ['required', 'numeric', 'digits_between:2,5'],
            'status' => ['required'],
        ];
    }
}
