<?php

namespace App\Http\Requests;

use App\Models\JoinUsPage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateJoinUsPageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('join_us_page_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
        ];
    }
}
