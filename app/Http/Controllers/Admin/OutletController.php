<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyOutletRequest;
use App\Http\Requests\StoreOutletRequest;
use App\Http\Requests\UpdateOutletRequest;
use App\Models\Outlet;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class OutletController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('outlet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outlets = Outlet::with(['media'])->get();

        return view('admin.outlets.index', compact('outlets'));
    }

    public function create()
    {
        abort_if(Gate::denies('outlet_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.outlets.create');
    }

    public function store(StoreOutletRequest $request)
    {
        $outlet = Outlet::create($request->all());

        if ($request->input('photo', false)) {
            $outlet->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $outlet->id]);
        }

        return redirect()->route('admin.outlets.index');
    }

    public function edit(Outlet $outlet)
    {
        abort_if(Gate::denies('outlet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.outlets.edit', compact('outlet'));
    }

    public function update(UpdateOutletRequest $request, Outlet $outlet)
    {
        $outlet->update($request->all());

        if ($request->input('photo', false)) {
            if (! $outlet->photo || $request->input('photo') !== $outlet->photo->file_name) {
                if ($outlet->photo) {
                    $outlet->photo->delete();
                }
                $outlet->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($outlet->photo) {
            $outlet->photo->delete();
        }

        return redirect()->route('admin.outlets.index');
    }

    public function show(Outlet $outlet)
    {
        abort_if(Gate::denies('outlet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.outlets.show', compact('outlet'));
    }

    public function destroy(Outlet $outlet)
    {
        abort_if(Gate::denies('outlet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outlet->delete();

        return back();
    }

    public function massDestroy(MassDestroyOutletRequest $request)
    {
        $outlets = Outlet::find(request('ids'));

        foreach ($outlets as $outlet) {
            $outlet->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('outlet_create') && Gate::denies('outlet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Outlet();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}