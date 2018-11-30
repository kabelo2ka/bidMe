<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // Update vs Create 'unique field' fix
        $unique_sku = request()->product ? 'unique:products,sku,' . request()->product->id : 'unique:products';
        return [
            'name' => 'required|max:255',
            'sku' => 'required|max:20|' . $unique_sku,
            'price' => 'required',
            'description' => 'required',
//            'image_url' => 'image',
//            'active' => 'required|boolean',
        ];
    }
}
