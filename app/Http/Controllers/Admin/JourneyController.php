<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\UpdateJourneyRequest;
use App\Http\Requests\MassDestroyJourneyRequest;
use App\Http\Requests\StoreJourneyRequest;
use App\Models\Journey;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class JourneyController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        $journeys = Journey::get();
        return view('admin.journeys.index', compact('journeys'));
    }

    public function store(StoreJourneyRequest $request)
    {
        $journey = Journey::create($request->all());

        if ($request->input('photo', false)) {
            $journey->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $journey->id]);
        }

        return redirect()->route('admin.journeys.index');
    }

    public function update(UpdateJourneyRequest $request, Journey $journey)
    {
        $journey->update($request->all());

        if ($request->input('photo', false)) {
            if (! $journey->photo || $request->input('photo') !== $journey->photo->file_name) {
                if ($journey->photo) {
                    $journey->photo->delete();
                }
                $journey->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($journey->photo) {
            $journey->photo->delete();
        }

        return redirect()->route('admin.journeys.index');
    }

    public function destroy(Journey $journey)
    {
        $journey->delete();

        return back();
    }

    public function massDestroy(MassDestroyJourneyRequest $request)
    {
        $journeys = Journey::find(request('ids'));

        foreach ($journeys as $journey) {
            $journey->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        $model         = new Journey();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
