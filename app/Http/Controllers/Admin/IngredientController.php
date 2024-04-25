<?php

namespace App\Http\Controllers\Admin;

use Gate;
use App\Models\Ingredient;
use App\Models\IngredientCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIngredientRequest;
use App\Http\Requests\UpdateIngredientRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\MassDestroyIngredientRequest;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class IngredientController extends Controller
{
    use MediaUploadingTrait;
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // abort_if(Gate::denies('ingredient_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ingredients = Ingredient::with(['categories', 'media'])->get();

        return view('admin.ingredients.index', compact('ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // abort_if(Gate::denies('ingredient_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = IngredientCategory::pluck('name', 'id');

        return view('admin.ingredients.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIngredientRequest $request)
    {
        $ingredient = Ingredient::create($request->all());
        $ingredient->categories()->sync($request->input('categories', []));
        if ($request->input('photo', false)) {
            $ingredient->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $ingredient->id]);
        }

        return redirect()->route('admin.ingredients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ingredient $ingredient)
    {
        // abort_if(Gate::denies('ingredient_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ingredient->load('categories');

        return view('admin.ingredients.show', compact('ingredient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ingredient $ingredient)
    {
        // abort_if(Gate::denies('ingredient_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = IngredientCategory::pluck('name', 'id');

        $ingredient->load('categories');

        return view('admin.ingredients.edit', compact('categories', 'ingredient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIngredientRequest $request, Ingredient $ingredient)
    {
        $ingredient->update($request->all());
        $ingredient->categories()->sync($request->input('categories', []));
        if ($request->input('photo', false)) {
            if (! $ingredient->photo || $request->input('photo') !== $ingredient->photo->file_name) {
                if ($ingredient->photo) {
                    $ingredient->photo->delete();
                }
                $ingredient->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($ingredient->photo) {
            $ingredient->photo->delete();
        }

        return redirect()->route('admin.ingredients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingredient $ingredient)
    {
        // abort_if(Gate::denies('ingredient_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ingredient->delete();

        return back();
    }

    public function massDestroy(MassDestroyIngredientRequest $request)
    {
        $ingredients = Ingredient::find(request('ids'));

        foreach ($ingredients as $ingredient) {
            $ingredient->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
