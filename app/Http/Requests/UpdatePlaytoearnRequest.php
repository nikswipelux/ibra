<?php

namespace App\Http\Requests;

use App\Models\Playtoearn;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePlaytoearnRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('playtoearn_edit');
    }

    public function rules()
    {
        return [
            'project_link' => [
                'string',
                'nullable',
            ],
            'name' => [
                'string',
                'nullable',
            ],
            'status' => [
                'string',
                'nullable',
            ],
            'nft_support' => [
                'string',
                'nullable',
            ],
            'blockchain' => [
                'string',
                'nullable',
            ],
            'website' => [
                'string',
                'nullable',
            ],
            'twitter' => [
                'string',
                'nullable',
            ],
            'discord' => [
                'string',
                'nullable',
            ],
            'telegram' => [
                'string',
                'nullable',
            ],
            'total_rank' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
