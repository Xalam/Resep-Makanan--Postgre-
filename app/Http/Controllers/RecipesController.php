<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ingredients;
use App\Models\Recipes;
use App\Models\RecipesIngredients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('recipes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingredients = Ingredients::all();
        $category = Category::all();
        return view('recipes.create', compact('ingredients', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $extension = $request->file('image')->extension();
        $imageName = $request->recipes_name . '.' . $extension;
        Storage::putFileAs('public/image', $request->file('image'), $imageName);

        $data['recipes_name'] = $request->recipes_name;
        $data['image'] = $imageName;
        $data['category_id'] = $request->category_id;

        Recipes::create($data);

        $recipes_id = Recipes::orderBy('id', 'DESC')->first();

        if (count($request->rows) > 0) {
            for ($i = 0; $i < count($request->rows); $i++) {

                RecipesIngredients::create([
                    'recipes_id'       => $recipes_id->id,
                    'ingredients_id'   => $request->ingredients_id[$i]
                ]);
            }
        }

        return redirect()->route('recipes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipes = Recipes::findOrFail($id);
        $ingredients = RecipesIngredients::where('recipes_id', $id)->get();
        return view('recipes.show', compact('recipes', 'ingredients'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipes = Recipes::findOrFail($id);
        $category = Category::all();
        return view('recipes.edit', compact('recipes', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $recipes = Recipes::findOrFail($id);
        $recipes->recipes_name = $request->recipes_name;
        $recipes->category_id = $request->category_id;
        $recipes->save();

        return redirect()->route('recipes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipes = Recipes::findOrFail($id);
        RecipesIngredients::where('recipes_id', $id)->delete();
        Storage::delete('public/image/' . $recipes->image);
        $recipes->delete();
    }

    public function read()
    {
        $recipes = Recipes::all();

        return view('recipes.read', compact('recipes'));
    }
}
