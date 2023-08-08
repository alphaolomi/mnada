<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBidRequest extends FormRequest
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
        return [
            'amount' => ['required', 'numeric', 'min:0.01'],
            'bidder_id' => ['required', 'exists:users,id'],
            'auction_item_id' => ['required', 'exists:auction_items,id'],
        ];
    }

    // prepareForValidation
    protected function prepareForValidation(): void
    {
        $this->merge([
            'bidder_id' => auth()->id(),
        ]);
    }
}
