<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(){
        $user = User::find(session()->get('loginId'));
        $reservations = Reservation::all();
        return(view('reservation', compact('reservations', 'user')));
    }

    public function create(){
        return(view('addreservation'));
    }

    public function store(Request $request){
        $addReservation = new Reservation;
        $addReservation->description = $request->description;
        $addReservation->save();

        return redirect()->action(
            [ReservationController::class, 'index']
        );
    }



    public function destroy(Reservation $reservation, $id){
        $reservation = Reservation::find($id);
        $reservation->delete();

        return redirect()->action(
            [ReservationController::class, 'index']
        );
    }
}
