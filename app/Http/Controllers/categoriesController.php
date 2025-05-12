<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;

class categoriesController extends Controller
{
    public function index()
{
    $categories = categories::all();
    return view('admin.page.categorie.categorie', compact('categories'));
}


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required'
        ]);

        categories::create($validated);

        return redirect()->route('categories.index')->with('success', 'Catégorie créée avec succès');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required'
        ]);

        $category = categories::findOrFail($id);
        $category->update($validated);

        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès');
    }

    public function destroy($id)
    {
        $category = categories::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès');
    }
}
