<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCmcRequest;
use App\Http\Requests\UpdateCmcRequest;
use App\Http\Resources\Admin\CmcResource;
use App\Models\Cmc;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CmcApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cmc_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CmcResource(Cmc::all());
    }

    public function store(StoreCmcRequest $request)
    {
        $cmc = Cmc::create($request->all());

        return (new CmcResource($cmc))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Cmc $cmc)
    {
        abort_if(Gate::denies('cmc_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CmcResource($cmc);
    }

    public function update(UpdateCmcRequest $request, Cmc $cmc)
    {
        $cmc->update($request->all());

        return (new CmcResource($cmc))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Cmc $cmc)
    {
        abort_if(Gate::denies('cmc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cmc->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
