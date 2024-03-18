<?php

namespace App\Http\Requests;

use App\Models\Outlet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOutletRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('outlet_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'business_hour' => [
                'string',
                'nullable',
            ],
        ];
    }
}