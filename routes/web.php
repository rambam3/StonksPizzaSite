<?php

use App\Http\Controllers\BestellingController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MedewerkerBestellingController;
use App\Http\Controllers\BestelregelController;
use App\Http\Controllers\ManagerController;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/faq', function () {
    return view('klant.faq');
})->name('faq');

route::get('/overons', function () {
    return view('klant.overons');
})->name('overons');


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('RedirectManager')->group(function () {
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/submit-contact', [ContactController::class, 'submit']);

Route::get('/bestelmethode', [BestellingController::class, 'bestelmethode'])->name('bestelmethode');
Route::post('/bestellen', [BestellingController::class, 'index'])->name('bestellen');

Route::get('/bestel-methode', [BestellingController::class, 'showBestelMethode'])->name('bestelMethode');
Route::get('/afrekenen', [BestellingController::class, 'afrekenen'])->name('afrekenen');
Route::post('/bestelling-afronden', [BestellingController::class, 'store'])->name('FinishBestelling');
Route::get('/bestelling-status/{bestelling}', [BestellingController::class, 'show'])->name('showStatus');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('medewerker')->group(function () {
    Route::get('bestelling/{bestelling}/edit', [MedewerkerBestellingController::class, 'edit'])->name('bestelling.edit');
    Route::put('bestelling/{bestelling}', [MedewerkerBestellingController::class, 'update'])->name('bestelling.update');
    Route::delete('bestelling-delete', [MedewerkerBestellingController::class, 'destroy'])->name('bestelling.destroy');
    Route::get('bestelling', [MedewerkerBestellingController::class, 'index'])->name('bestelling.index');

    Route::get('ingredienten', [IngredientController::class, 'index'])->name('ingredienten.index');
    Route::get('ingredienten/create', [IngredientController::class, 'create'])->name('ingredienten.create');
    Route::post('ingredienten', [IngredientController::class, 'store'])->name('ingredienten.store');
    Route::get('ingredienten/{ingredient}/edit', [IngredientController::class, 'edit'])->name('ingredienten.edit');
    Route::put('ingredienten/{ingredient}', [IngredientController::class, 'update'])->name('ingredienten.update');
    Route::delete('ingredienten/{ingredient}', [IngredientController::class, 'destroy'])->name('ingredienten.destroy');

    Route::get('pizzas', [PizzaController::class, 'index'])->name('pizzas.index');
    Route::get('pizzas/create', [PizzaController::class, 'create'])->name('pizzas.create');
    Route::post('pizzas', [PizzaController::class, 'store'])->name('pizzas.store');
    Route::get('pizzas/{pizza}/edit', [PizzaController::class, 'edit'])->name('pizzas.edit');
    Route::put('pizzas/{pizza}', [PizzaController::class, 'update'])->name('pizzas.update');
    Route::delete('pizzas/{pizza}', [PizzaController::class, 'destroy'])->name('pizzas.destroy');
});

Route::middleware('manager')->group(function () {
    Route::get('manager', [ManagerController::class, 'index'])->name('manager.index');
    Route::delete('manager/{user}', [ManagerController::class, 'destroy'])->name('manager.destroy');
    Route::get('manager/{user}/edit', [ManagerController::class, 'edit'])->name('manager.edit');
    Route::put('manager/{user}', [ManagerController::class, 'update'])->name('manager.update');
    Route::get('manager/create', [ManagerController::class, 'create'])->name('manager.create');
    Route::post('manager', [ManagerController::class, 'store'])->name('manager.store');
});







require __DIR__ . '/auth.php';
