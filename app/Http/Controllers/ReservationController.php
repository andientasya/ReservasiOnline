<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Auth::user()->reservations()->with('category')->latest()->get();
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('reservations.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'item_name' => 'required|string|max:255',
            'reservation_date' => 'required|date|after_or_equal:today',
            'reservation_time' => 'required',
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        Reservation::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'item_name' => $request->item_name,
            'reservation_date' => $request->reservation_date,
            'reservation_time' => $request->reservation_time,
            'quantity' => $request->quantity,
            'notes' => $request->notes,
        ]);

        return redirect()->route('reservations.index')
            ->with('success', 'Reservasi berhasil dibuat!');
    }

    public function show(Reservation $reservation)
    {
        $this->authorize('view', $reservation);
        return view('reservations.show', compact('reservation'));
    }

    public function destroy(Reservation $reservation)
    {
        $this->authorize('delete', $reservation);
        $reservation->delete();
        
        return redirect()->route('reservations.index')
            ->with('success', 'Reservasi berhasil dibatalkan!');
    }
}