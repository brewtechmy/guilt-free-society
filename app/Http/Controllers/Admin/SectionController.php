<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\UpdateSectionRequest;
use App\Models\Section;
use Gate;

class SectionController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        // abort_if(Gate::denies('section_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sections = Section::get();
        return view('admin.sections.index', compact('sections'));
    }

    public function update(UpdateSectionRequest $request)
    {
        foreach ($request->all() as $key => $value) {
            Section::where('key', $key)->update(['value' => $value]);

            $section = Section::where('key', $key)->first();

            if (isset($section) && $section->input_type == 'image') {
                if (!$section->photo || $value !== $section->photo->file_name) {
                    if ($section->photo) {
                        $section->photo->delete();
                    }
                    $section->addMedia(storage_path('tmp/uploads/' . basename($request->input($key))))->toMediaCollection('photo');
                }
            }
        }

        return redirect()->route('admin.sections.index')->with('message', __('global.update_section_success'));
    }
}
