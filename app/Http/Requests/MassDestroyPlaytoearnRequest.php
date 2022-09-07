<?php

namespace App\Http\Requests;

use App\Models\Playtoearn;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPlaytoearnRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('playtoearn_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:playtoearns,id',
        ];
    }
}
