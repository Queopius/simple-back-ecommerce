<?php

namespace App\Http\Requests\Category;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Http\FormRequest;
use App\Actions\Category\Traits\GetCategoryData;

class StoreCategoryRequest extends FormRequest
{
    use GetCategoryData;

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
            'description'       => ['nullable', 'string', 'max:600']
        ];

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
        ];
    }

    public function createCategory()
    {
        DB::transaction(function () {
            $category = Category::forceCreate($this->data());
            $category->save();

            if (!$category) {
                Log::channel('management')
                    ->error("Error creating Category: ".$category->name);
            }

            Log::channel('management')
                ->info('Category "' .$category->name. '" has been created with success.');
        });
    }
}
