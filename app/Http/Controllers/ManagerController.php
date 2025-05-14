<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

class ManagerController extends Controller
{
    /**
     * Affiche la liste des managers.
     */
    public function index()
    {
        $managers = User::where('usertype', 'manager')->get();
        return view('admin.page.gestionnaire.gestionnaire', compact('managers'));
    }

    /**
     * Enregistre un nouveau manager.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'sexe' => ['required', Rule::in(['Masculin', 'Féminin'])],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['nullable', 'string', 'max:20'],
            'usertype' => ['required', Rule::in(User::USERTYPES)],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Forcer usertype à 'manager' pour éviter erreur si formulaire modifié
        $usertype = $request->input('usertype') === 'manager' ? 'manager' : 'manager';

        User::create([
            'name' => $request->name,
            'sexe' => $request->sexe,
            'email' => $request->email,
            'phone' => $request->phone,
            'usertype' => $usertype,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('managers.index')->with('success', 'Gestionnaire ajouté avec succès.');
    }

    /**
     * Met à jour un manager existant.
     */
    public function update(Request $request, $id)
    {
        $manager = User::where('usertype', 'manager')->findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'sexe' => ['required', Rule::in(['Masculin', 'Féminin'])],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($manager->id)],
            'phone' => ['nullable', 'string', 'max:20'],
            'usertype' => ['required', Rule::in(User::USERTYPES)],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        $manager->name = $request->name;
        $manager->sexe = $request->sexe;
        $manager->email = $request->email;
        $manager->phone = $request->phone;
        // Forcer usertype à 'manager' pour éviter modification non souhaitée
        $manager->usertype = 'manager';

        if ($request->filled('password')) {
            $manager->password = Hash::make($request->password);
        }

        $manager->save();

        return redirect()->route('managers.index')->with('success', 'Gestionnaire mis à jour avec succès.');
    }

    /**
     * Supprime un manager.
     */
    public function destroy($id)
    {
        $manager = User::where('usertype', 'manager')->findOrFail($id);
        $manager->delete();

        return redirect()->route('managers.index')->with('success', 'Gestionnaire supprimé avec succès.');
    }
}
