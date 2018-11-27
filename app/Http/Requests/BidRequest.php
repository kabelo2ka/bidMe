<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BidRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        cookie()->queue('bidder_email', $this->email, 60*24*7); // Save email to cookie for 7 days
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
            'email' => 'unique:bids,email,NULL,id,product_id,' . $this->product_id,
            'price' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'You have already placed a bid on this product.'
        ];
    }
}
