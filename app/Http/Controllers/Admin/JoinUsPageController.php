<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyJoinUsPageRequest;
use App\Http\Requests\StoreJoinUsPageRequest;
use App\Http\Requests\UpdateJoinUsPageRequest;
use App\Models\JoinUsPage;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class JoinUsPageController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('join_us_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $joinUsPages = JoinUsPage::with(['media'])->get();

        return view('admin.joinUsPages.index', compact('joinUsPages'));
    }

    public function create()
    {
        abort_if(Gate::denies('join_us_page_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.joinUsPages.create');
    }

    public function store(StoreJoinUsPageRequest $request)
    {
        $joinUsPage = JoinUsPage::create($request->all());

        if ($request->input('photo', false)) {
            $joinUsPage->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $joinUsPage->id]);
        }

        return redirect()->route('admin.join-us-pages.index');
    }

    public function edit(JoinUsPage $joinUsPage)
    {
        abort_if(Gate::denies('join_us_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.joinUsPages.edit', compact('joinUsPage'));
    }

    public function update(UpdateJoinUsPageRequest $request, JoinUsPage $joinUsPage)
    {
        $joinUsPage->update($request->all());

        if ($request->input('photo', false)) {
            if (! $joinUsPage->photo || $request->input('photo') !== $joinUsPage->photo->file_name) {
                if ($joinUsPage->photo) {
                    $joinUsPage->photo->delete();
                }
                $joinUsPage->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($joinUsPage->photo) {
            $joinUsPage->photo->delete();
        }

        return redirect()->route('admin.join-us-pages.index');
    }

    public function show(JoinUsPage $joinUsPage)
    {
        abort_if(Gate::denies('join_us_page_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.joinUsPages.show', compact('joinUsPage'));
    }

    public function destroy(JoinUsPage $joinUsPage)
    {
        abort_if(Gate::denies('join_us_page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $joinUsPage->delete();

        return back();
    }

    public function massDestroy(MassDestroyJoinUsPageRequest $request)
    {
        $joinUsPages = JoinUsPage::find(request('ids'));

        foreach ($joinUsPages as $joinUsPage) {
            $joinUsPage->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('join_us_page_create') && Gate::denies('join_us_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new JoinUsPage();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
