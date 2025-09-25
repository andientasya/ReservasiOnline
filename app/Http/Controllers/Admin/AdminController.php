<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalReservations = Reservation::count();
        $pendingReservations = Reservation::where('status', 'pending')->count();
        $confirmedReservations = Reservation::where('status', 'confirmed')->count();
        
        return view('admin.dashboard', compact(
            'totalReservations', 
            'pendingReservations', 
            'confirmedReservations'
        ));
    }

    public function reservations()
    {
        $reservations = Reservation::with(['user', 'category'])->latest()->get();
        return view('admin.reservations', compact('reservations'));
    }

    public function updateStatus(Request $request, Reservation $reservation)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled'
        ]);

        $reservation->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Status reservasi berhasil diupdate!');
    }
}