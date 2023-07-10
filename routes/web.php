<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use App\Models\categorie;
use App\Models\produit;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    $categories=categorie::all();
    $produits=produit::all();
    return view('template_client',compact("categories","produits"));
});
Route::get('/a', function () {
    $categories=categorie::all();
    $produits=produit::all();
    return view('template_admin',compact("categories","produits"));
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('/categories',CategorieController::class);
Route::resource('/produits',ProduitController::class);

Route::POST('/categories/{id}/edit',[CategorieController::class,'edit'])->name('categories.edit');
Route::GET('/show/{id}',[ProduitController  ::class,'show'])->name('produits.show') ;
Route::POST('/produits/{id}/edit',[ProduitController::class,'edit'])->name('produits.edit');
Route::patch('/produits/{id}/update',[ProduitController::class,'update'])->name('produits.update');

/* hedhi eshal aliha lemna3na3 */


require __DIR__.'/auth.php';
