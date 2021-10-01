<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IngredientsController;
use App\Http\Controllers\RecipesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/recipes/read', [RecipesController::class, 'read'])->name('recipes.read');
Route::resource('recipes', RecipesController::class);
Route::get('/category/read', [CategoryController::class, 'read'])->name('category.read');
Route::resource('category', CategoryController::class);
Route::get('/ingredients/read', [IngredientsController::class, 'read'])->name('ingredients.read');
Route::resource('ingredients', IngredientsController::class);
