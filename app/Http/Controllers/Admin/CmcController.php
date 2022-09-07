<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCmcRequest;
use App\Http\Requests\StoreCmcRequest;
use App\Http\Requests\UpdateCmcRequest;
use App\Models\Cmc;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CmcController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cmc_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cmcs = Cmc::all();

        return view('admin.cmcs.index', compact('cmcs'));
    }

    public function create()
    {
        abort_if(Gate::denies('cmc_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cmcs.create');
    }

    public function store(StoreCmcRequest $request)
    {
        $cmc = Cmc::create($request->all());

        return redirect()->route('admin.cmcs.index');
    }

    public function edit(Cmc $cmc)
    {
        abort_if(Gate::denies('cmc_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cmcs.edit', compact('cmc'));
    }

    public function update(UpdateCmcRequest $request, Cmc $cmc)
    {
        $cmc->update($request->all());

        return redirect()->route('admin.cmcs.index');
    }

    public function show(Cmc $cmc)
    {
        abort_if(Gate::denies('cmc_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cmcs.show', compact('cmc'));
    }

    public function destroy(Cmc $cmc)
    {
        abort_if(Gate::denies('cmc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cmc->delete();

        return back();
    }

    public function massDestroy(MassDestroyCmcRequest $request)
    {
        Cmc::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
