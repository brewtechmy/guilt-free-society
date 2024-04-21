<?php

namespace App\Http\Requests;

use App\Models\IngredientCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateIngredientCategoryRequest extends FormRequest
{
    public function authorize()
    {
        // return Gate::allows('ingredient_category_edit');
        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
