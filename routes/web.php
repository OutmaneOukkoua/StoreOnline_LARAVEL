<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ClientRegisterController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\LigneCommandeDemoController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;

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
    return view('welcome');
});


// Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');
// Route::get('/categories/{categorie}', [CategorieController::class, 'show'])->name('categories.show');
// Route::get('/categories/create', [CategorieController::class, 'create'])->name('categories.create');
// Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');
// Route::get('/categories/{categorie}/edit', [CategorieController::class, 'edit'])->name('categories.edit');
// Route::put('/categories/{categorie}', [CategorieController::class, 'update'])->name('categories.update');
// Route::delete('/categories/{categorie}', [CategorieController::class, 'destroy'])->name('categories.destroy');



Route::get('/produits', [ProduitController::class, 'index'])->name('produits.index');
Route::get('/produits/create', [ProduitController::class, 'create'])->name('produits.create')->middleware('role:admin');
Route::get('/produits/{produit}/edit', [ProduitController::class, 'edit'])->name('produits.edit')->middleware('role:admin');
Route::put('/produits/{produit}', [ProduitController::class, 'update'])->name('produits.update')->middleware('role:admin');
Route::delete('/produits/{produit}', [ProduitController::class, 'destroy'])->name('produits.destroy')->middleware('role:admin');

Route::post('/produits', [ProduitController::class, 'store'])->name('produits.store')->middleware('role:admin');
Route::get('/acheter/{categorie?}', [ProduitController::class, 'acheter'])->name('produits.acheter')->middleware('role:client');


Route::get('/commandes', [CommandeController::class, 'index'])->name('commandes.index')->middleware('role:client');
Route::post('/commandes', [CommandeController::class, 'store'])->name('commandes.store')->middleware('role:client');

Route::get('/commandes/{id}', [CommandeController::class, 'show'])->name('commandes.show')->middleware('role:admin');
Route::delete('/commandes/{id}', [CommandeController::class, 'destroy'])->name('commandes.destroy')->middleware('role:admin');
Route::post('/commandes/{id}/valider', [CommandeController::class, 'valider'])->name('commandes.valider')->middleware('role:admin');
Route::post('/commandes/{id}/annuler', [CommandeController::class, 'annuler'])->name('commandes.annuler')->middleware('role:admin');

Route::resource('categories', CategorieController::class);


Route::get('/LigneCommandeDemo', [LigneCommandeDemoController::class, 'index'])->name('LigneCommandeDemo.index')->middleware('role:admin');
Route::post('/LigneCommandeDemo', [LigneCommandeDemoController::class, 'store'])->name('LigneCommandeDemo.store')->middleware('role:admin');
Route::delete('/LigneCommandeDemo/{id}', [LigneCommandeDemoController::class, 'destroy'])->name('LigneCommandeDemo.destroy')->middleware('role:admin');

Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::post('/login', [LoginController::class, 'login'])->name('login.login');
Route::get('/register',[ClientRegisterController::class,'showRegistrationForm']);
Route::post('/register',[ClientRegisterController::class,'register'])->name('register.client');

// Route::resource('produits', ProduitController::class);