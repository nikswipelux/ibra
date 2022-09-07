<?php

namespace App\Http\Requests;

use App\Models\Cmc;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCmcRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('cmc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:cmcs,id',
        ];
    }
}
