<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\PaymentController;



// roote client
Route::get('/salle/{id}', [RoomController::class, 'show'])->name('salledetails');


Route::get('/', [RoomController::class, 'accueilliste'])->name('accueil');
Route::get('/salle', [RoomController::class, 'sallliste'])->name('salle');
//Route::get('/salle-details', [clientController::class, 'salledetails'])->name('salledetails');
Route::get('/contact', [clientController::class, 'contact'])->name('contact');
Route::get('/login_register', [clientController::class, 'login_register'])->name('login_register');
Route::get('/paniers', [clientController::class, 'panier'])->name('panier');
Route::get('/connexion', [clientController::class, 'connexion'])->name('connexion');
Route::get('/salles/{id}', [RoomController::class, 'salledetail'])->name('salledetails');


Route::get('/panier', [PanierController::class, 'index'])->name('panier');
Route::post('/panier/ajouter', [PanierController::class, 'ajouterAuPanier'])->name('panier.ajouter');
Route::delete('/panier/supprimer/{id}', [PanierController::class, 'supprimer'])->name('panier.supprimer');



// roote admin

Route::middleware(['auth', 'verified', 'is_admin'])->group(function () {
    Route::get('/log-admin/profil', function () { return view('admin.profil'); })->name('profil');

    Route::get('/log-admin/categorie', [CategorieController::class, 'index'])->name('categorie');
    Route::get('/log-admin/gestionnaire', [ManagerController::class, 'index'])->name('gestionnaire');
    Route::get('/log-admin/reservation', [adminController::class, 'reservation'])->name('reservation');
    Route::get('/log-admin/salle', [RoomController::class, 'index'])->name('salleAdmin');
    

    

    Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');
    Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');
    Route::put('/categories/{id}', [CategorieController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategorieController::class, 'destroy'])->name('categories.destroy');

    
    Route::get('/managers', [ManagerController::class, 'index'])->name('managers.index');
    Route::post('/managers', [ManagerController::class, 'store'])->name('managers.store');
    Route::put('/managers/{id}', [ManagerController::class, 'update'])->name('managers.update');
    Route::delete('/managers/{id}', [ManagerController::class, 'destroy'])->name('managers.destroy');

    

    // CRUD complet pour les salles


    // Afficher la liste des salles
    Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');

    // Enregistrer une nouvelle salle
    Route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store');

    // Mettre à jour une salle existante
    Route::put('/rooms/{room}', [RoomController::class, 'update'])->name('rooms.update');

    // Supprimer une salle
    Route::delete('/rooms/{room}', [RoomController::class, 'destroy'])->name('rooms.destroy');



    

});





//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/log-admin', function () {
    return view('admin.index');
})->middleware(['auth', 'verified', 'is_admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/paiement', [clientController::class, 'paiement'])->name('paiement');
    Route::get('/payment/callback', [PaymentController::class, 'handleCallback'])->name('payment.callback');
    // Route::get('/paiement', [PaiementController::class, 'callback'])->name('payment.callback');


    Route::get('/membre', [clientController::class, 'membre'])->name('membre');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
