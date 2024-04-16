<?php

namespace App\Http\Requests\Product;

use App\Models\Product;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Http\FormRequest;
use App\Actions\Product\Traits\GetProductData;

class UpdateProductRequest extends FormRequest
{
    use GetProductData;

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
        $rules = [
            'name'              => ['required', 'string', 'max:60'],
            'description'       => ['nullable', 'string', 'max:600'],
            'price'             => ['required', 'numeric', 'min:1'],
            'category_id'       => [
                'nullable',
                Rule::exists('categories', 'id'),
            ],
        ];

        if ($this->get('photo')) {
            $rules = array_merge($rules, ['photo' => 'nullable|image|max:2048']);
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'        => 'The name field is required.',
            'price.required'     => 'The price field is required.',
        ];
    }

    public function updateProduct(Product $product)
    {
        $product->forceFill($this->data());

        $product->save();

        if (!$product) {
            Log::error("Error updating collaborator: ".$product->name);
        }

        Log::info('Product "' .$product->name. '" has been updated with success.');
    }
}
