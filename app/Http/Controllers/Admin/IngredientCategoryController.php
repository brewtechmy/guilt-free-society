<?php

namespace App\Http\Controllers\Admin;

use Gate;
use Illuminate\Http\Request;
use App\Models\IngredientCategory;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreIngredientCategoryRequest;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Http\Requests\UpdateIngredientCategoryRequest;
use App\Http\Requests\MassDestroyIngredientCategoryRequest;

class IngredientCategoryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        // abort_if(Gate::denies('ingredient_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ingredientCategories = IngredientCategory::with(['media'])->get();

        return view('admin.ingredientCategories.index', compact('ingredientCategories'));
    }

    public function create()
    {
        // abort_if(Gate::denies('ingredient_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ingredientCategories.create');
    }

    public function store(StoreIngredientCategoryRequest $request)
    {
        $ingredientCategory = IngredientCategory::create($request->all());

        if ($request->input('photo', false)) {
            $ingredientCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $ingredientCategory->id]);
        }

        return redirect()->route('admin.ingredient-categories.index');
    }

    public function edit(IngredientCategory $ingredientCategory)
    {
        // abort_if(Gate::denies('ingredient_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ingredientCategories.edit', compact('ingredientCategory'));
    }

    public function update(UpdateIngredientCategoryRequest $request, IngredientCategory $ingredientCategory)
    {
        $ingredientCategory->update($request->all());

        if ($request->input('photo', false)) {
            if (! $ingredientCategory->photo || $request->input('photo') !== $ingredientCategory->photo->file_name) {
                if ($ingredientCategory->photo) {
                    $ingredientCategory->photo->delete();
                }
                $ingredientCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($ingredientCategory->photo) {
            $ingredientCategory->photo->delete();
        }

        return redirect()->route('admin.ingredient-categories.index');
    }

    public function show(IngredientCategory $ingredientCategory)
    {
        // abort_if(Gate::denies('ingredient_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ingredientCategories.show', compact('ingredientCategory'));
    }

    public function destroy(IngredientCategory $ingredientCategory)
    {
        // abort_if(Gate::denies('ingredient_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ingredientCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyIngredientCategoryRequest $request)
    {
        $ingredientCategories = IngredientCategory::find(request('ids'));

        foreach ($ingredientCategories as $ingredientCategory) {
            $ingredientCategory->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        // abort_if(Gate::denies('ingredient_category_create') && Gate::denies('ingredient_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new IngredientCategory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
