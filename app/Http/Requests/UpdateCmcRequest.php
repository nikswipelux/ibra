<?php

namespace App\Http\Requests;

use App\Models\Cmc;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCmcRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cmc_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'website' => [
                'string',
                'required',
                'unique:cmcs,website,' . request()->route('cmc')->id,
            ],
            'telegram' => [
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
            'price' => [
                'string',
                'nullable',
            ],
            'market_cap' => [
                'string',
                'nullable',
            ],
            'cmc_link' => [
                'string',
                'nullable',
            ],
        ];
    }
}
