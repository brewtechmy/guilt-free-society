<?php

namespace App\Http\Requests;

use App\Models\IngredientCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyIngredientCategoryRequest extends FormRequest
{
    public function authorize()
    {
        // abort_if(Gate::denies('ingredient_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:ingredient_categories,id',
        ];
    }
}
