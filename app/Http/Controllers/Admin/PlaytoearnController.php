<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPlaytoearnRequest;
use App\Http\Requests\StorePlaytoearnRequest;
use App\Http\Requests\UpdatePlaytoearnRequest;
use App\Models\Playtoearn;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlaytoearnController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('playtoearn_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $playtoearns = Playtoearn::all();

        return view('admin.playtoearns.index', compact('playtoearns'));
    }

    public function create()
    {
        abort_if(Gate::denies('playtoearn_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.playtoearns.create');
    }

    public function store(StorePlaytoearnRequest $request)
    {
        $playtoearn = Playtoearn::create($request->all());

        return redirect()->route('admin.playtoearns.index');
    }

    public function edit(Playtoearn $playtoearn)
    {
        abort_if(Gate::denies('playtoearn_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.playtoearns.edit', compact('playtoearn'));
    }

    public function update(UpdatePlaytoearnRequest $request, Playtoearn $playtoearn)
    {
        $playtoearn->update($request->all());

        return redirect()->route('admin.playtoearns.index');
    }

    public function show(Playtoearn $playtoearn)
    {
        abort_if(Gate::denies('playtoearn_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.playtoearns.show', compact('playtoearn'));
    }

    public function destroy(Playtoearn $playtoearn)
    {
        abort_if(Gate::denies('playtoearn_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $playtoearn->delete();

        return back();
    }

    public function massDestroy(MassDestroyPlaytoearnRequest $request)
    {
        Playtoearn::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
