<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index()
    {
        $cards = Card::all();
        return view('cards.index', compact('cards'));
    }

    public function create()
    {
        return view('cards.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'uid' => 'required|unique:cards',
            'name' => 'required|string|max:255',
        ]);

        Card::create($request->all());
        return redirect()->route('cards.index')->with('success', 'Card berhasil ditambahkan');
    }

    public function edit(Card $card)
    {
        return view('cards.edit', compact('card'));
    }

    public function update(Request $request, Card $card)
    {
        $request->validate([
            'uid' => 'required|unique:cards,uid,' . $card->id,
            'name' => 'required|string|max:255',
        ]);

        $card->update($request->all());
        return redirect()->route('cards.index')->with('success', 'Card berhasil diperbarui');
    }

    public function destroy(Card $card)
    {
        $card->delete();
        return redirect()->route('cards.index')->with('success', 'Card berhasil dihapus');
    }
}
