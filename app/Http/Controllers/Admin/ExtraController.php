<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyExtraRequest;
use App\Http\Requests\StoreExtraRequest;
use App\Http\Requests\UpdateExtraRequest;
use App\Models\Extra;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExtraController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('extra_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $extras = Extra::all();

        return view('admin.extras.index', compact('extras'));
    }

    public function create()
    {
        abort_if(Gate::denies('extra_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.extras.create');
    }

    public function store(StoreExtraRequest $request)
    {
        $extra = Extra::create($request->all());
        $extra->addMedia($request->image)->toMediaCollection('image');

        return redirect()->route('admin.extras.index');
    }

    public function edit(Extra $extra)
    {
        abort_if(Gate::denies('extra_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.extras.edit', compact('extra'));
    }

    public function update(UpdateExtraRequest $request, Extra $extra)
    {
        $extra->update($request->all());
        if ($request->has('image') && $request->image !== null) {
            $extra->clearMediaCollection('image');
            $extra->addMedia($request->image)->toMediaCollection('image');
        }

        return redirect()->route('admin.extras.index');
    }

    public function show(Extra $extra)
    {
        abort_if(Gate::denies('extra_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.extras.show', compact('extra'));
    }

    public function destroy(Extra $extra)
    {
        abort_if(Gate::denies('extra_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $extra->delete();

        return back();
    }

    public function massDestroy(MassDestroyExtraRequest $request)
    {
        $extras = Extra::find(request('ids'));

        foreach ($extras as $extra) {
            $extra->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
