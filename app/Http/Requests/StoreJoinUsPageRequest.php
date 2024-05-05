<?php

namespace App\Http\Requests;

use App\Models\JoinUsPage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreJoinUsPageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('join_us_page_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'position' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
