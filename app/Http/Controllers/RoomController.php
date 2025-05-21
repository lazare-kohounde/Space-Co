<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('category')->get();
        return view('admin.page.salle.salle', compact('rooms'));
    }
    public function accueilliste()
    {
        $rooms = Room::with('category')->get(); // récupère toutes les salles avec leur catégorie

        //dd($rooms);
        return view('client.index', compact('rooms'));
    }

    public function sallliste(Request $request)
    {
        $categories = Categorie::all();
        $categoryId = $request->query('category');
        $rooms = Room::when($categoryId, function ($query, $categoryId) {
            return $query->where('category_id', $categoryId);
        })->paginate(15); // Ici tu ajoutes la pagination

        return view('client.salle', compact('rooms', 'categories', 'categoryId'));
    }

    public function salledetail($id)
    {
        $room = Room::with('category')->findOrFail($id);
        $images = json_decode($room->image) ?? [];

        return view('client.salle-details', compact('room', 'images'));
    }




    




    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'options' => 'nullable|string'
        ]);

        $imagesPaths = [];
        foreach ($request->file('images') as $image) {
            $path = $image->store('public/rooms');
            $imagesPaths[] = Storage::url($path);
        }

        Room::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'options' => $request->options,
            'image' => json_encode($imagesPaths)
        ]);

        return redirect()->route('rooms.index')->with('success', 'Salle créée avec succès');
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'images' => 'sometimes|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:16384',
            'options' => 'nullable|string'
        ]);

        $updateData = $request->only(['name', 'description', 'price', 'category_id', 'options']);

        if ($request->hasFile('images')) {
            $imagesPaths = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/rooms');
                $imagesPaths[] = Storage::url($path);
            }
            $updateData['image'] = json_encode($imagesPaths);
        }

        $room->update($updateData);

        return redirect()->route('rooms.index')->with('success', 'Salle mise à jour avec succès');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Salle supprimée avec succès');
    }
}
