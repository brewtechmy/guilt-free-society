<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSectionRequest;
use App\Models\Section;
use Gate;

class SectionController extends Controller
{
    public function index()
    {
        // abort_if(Gate::denies('section_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sections = Section::get();
        return view('admin.sections.index', compact('sections'));
    }

    public function update(UpdateSectionRequest $request)
    {
        foreach($request->all() as $key => $value){
            Section::where('key', $key)->update(['value' => $value]);
        }

        return redirect()->route('admin.sections.index');
    }
}
