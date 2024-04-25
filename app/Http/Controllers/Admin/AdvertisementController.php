<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAdvertisementRequest;
use App\Http\Requests\StoreAdvertisementRequest;
use App\Http\Requests\UpdateAdvertisementRequest;
use App\Models\Advertisement;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AdvertisementController extends Controller
{

    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('advertisement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $advertisements = Advertisement::all();

        return view('admin.advertisements.index', compact('advertisements'));
    }

    public function create()
    {
        abort_if(Gate::denies('advertisement_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $maxPositionValue = Advertisement::max('position');

        return view('admin.advertisements.create', compact('maxPositionValue'));
    }

    public function store(StoreAdvertisementRequest $request)
    {
        $existPosition = Advertisement::where("position", $request['position'])->first();
        if(isset($existPosition)){
            $maxPositionValue = Advertisement::max('position');
            $existPosition->position = $maxPositionValue + 1;
            $existPosition->save();
        }

        $advertisement = Advertisement::create($request->all());

        if ($request->input('photo', false)) {
            $advertisement->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $advertisement->id]);
        }

        return redirect()->route('admin.advertisements.index');
    }

    public function edit(Advertisement $advertisement)
    {
        abort_if(Gate::denies('advertisement_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.advertisements.edit', compact('advertisement'));
    }

    public function update(UpdateAdvertisementRequest $request, Advertisement $advertisement)
    {
        $existPosition = Advertisement::where("position", $request['position'])->first();
        if(isset($existPosition)){
            $existPosition->position = $advertisement->position;
            $existPosition->save();
        }

        $advertisement->update($request->all());

        if ($request->input('photo', false)) {
            if (! $advertisement->photo || $request->input('photo') !== $advertisement->photo->file_name) {
                if ($advertisement->photo) {
                    $advertisement->photo->delete();
                }
                $advertisement->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($advertisement->photo) {
            $advertisement->photo->delete();
        }

        return redirect()->route('admin.advertisements.index');
    }

    public function show(Advertisement $advertisement)
    {
        abort_if(Gate::denies('advertisement_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.advertisements.show', compact('advertisement'));
    }

    public function destroy(Advertisement $advertisement)
    {
        abort_if(Gate::denies('advertisement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $advertisement->delete();

        return back();
    }

    public function massDestroy(MassDestroyAdvertisementRequest $request)
    {
        $advertisements = Advertisement::find(request('ids'));

        foreach ($advertisements as $advertisement) {
            $advertisement->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('advertisement_create') && Gate::denies('advertisement_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Advertisement();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
