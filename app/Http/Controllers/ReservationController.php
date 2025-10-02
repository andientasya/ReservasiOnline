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
        $reservations = Auth::user()
            ->reservations()
            ->with('category')
            ->latest()
            ->get();

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
            'category_id'       => 'required|exists:categories,id',
            'name'              => 'required|string|max:255',
            'gender'            => 'required|in:Laki-laki,Perempuan',
            'item_name'         => 'required|string|max:255',
            'reservation_date'  => 'required|date|after_or_equal:today',
            'reservation_time'  => 'required',
            'quantity'          => 'required|integer|min:1',
            'room_preference'   => 'nullable|string',
            'bed_config'        => 'nullable|string',
            'notes'             => 'nullable|string',
        ]);

        Reservation::create([
            'user_id'           => Auth::id(),
            'category_id'       => $request->category_id,
            'name'              => $request->name,
            'gender'            => $request->gender,
            'item_name'         => $request->item_name,
            'reservation_date'  => $request->reservation_date,
            'reservation_time'  => $request->reservation_time,
            'quantity'          => $request->quantity,
            'room_preference'   => $request->room_preference,
            'bed_config'        => $request->bed_config,
            'notes'             => $request->notes,
        ]);

        return redirect()->route('reservations.index')
            ->with('success', 'Reservasi berhasil dibuat!');
    }

    public function show(Reservation $reservation)
    {
        if ($reservation->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki izin untuk melihat reservasi ini.');
        }

        return view('reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        if ($reservation->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki izin untuk mengedit reservasi ini.');
        }

        $categories = Category::all();
        return view('reservations.edit', compact('reservation', 'categories'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        if ($reservation->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki izin untuk mengupdate reservasi ini.');
        }

        $request->validate([
            'category_id'       => 'required|exists:categories,id',
            'name'              => 'required|string|max:255',
            'gender'            => 'required|in:Laki-laki,Perempuan',
            'item_name'         => 'required|string|max:255',
            'reservation_date'  => 'required|date|after_or_equal:today',
            'reservation_time'  => 'required',
            'quantity'          => 'required|integer|min:1',
            'room_preference'   => 'nullable|string',
            'bed_config'        => 'nullable|string',
            'notes'             => 'nullable|string',
        ]);

        $reservation->update([
            'category_id'       => $request->category_id,
            'name'              => $request->name,
            'gender'            => $request->gender,
            'item_name'         => $request->item_name,
            'reservation_date'  => $request->reservation_date,
            'reservation_time'  => $request->reservation_time,
            'quantity'          => $request->quantity,
            'room_preference'   => $request->room_preference,
            'bed_config'        => $request->bed_config,
            'notes'             => $request->notes,
        ]);

        return redirect()->route('reservations.index')
            ->with('success', 'Reservasi berhasil diperbarui!');
    }

    public function destroy(Reservation $reservation)
    {
        if ($reservation->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki izin untuk membatalkan reservasi ini.');
        }

        $reservation->delete();

        return redirect()->route('reservations.index')
            ->with('success', 'Reservasi berhasil dibatalkan!');
    }
}
