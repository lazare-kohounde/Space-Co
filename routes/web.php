<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\clientController;


// roote client

Route::get('/', function () {    return view('client.index');})->name('accueil');
Route::get('/salle', [clientController::class, 'liste_salle'])->name('salle');
Route::get('/salle-details', [clientController::class, 'salledetails'])->name('salledetails');
Route::get('/contact', [clientController::class, 'contact'])->name('contact');
Route::get('/login_register', [clientController::class, 'login_register'])->name('login_register');
Route::get('/panier', [clientController::class, 'panier'])->name('panier');
Route::get('/connexion', [clientController::class, 'connexion'])->name('connexion');





// roote admin

Route::middleware(['auth', 'verified', 'is_admin'])->group(function () {
    Route::get('/log-admin/profil', function () {
        return view('admin.profil');
    })->name('profil');

    Route::get('/log-admin/categorie', [adminController::class, 'categorie'])->name('categorie');
    Route::get('/log-admin/gestionnaire', [adminController::class, 'gestionnaire'])->name('gestionnaire');
    Route::get('/log-admin/reservation', [adminController::class, 'reservation'])->name('reservation');
    Route::get('/log-admin/salle', [adminController::class, 'salle'])->name('salleAdmin');
});





//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/log-admin', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/paiement', [clientController::class, 'paiement'])->name('paiement');
    Route::get('/membre', [clientController::class, 'membre'])->name('membre');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
