<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function index() {
        return view('shared.index');
    }

    public function contact() {
        return view('shared.contact');
    }

    public function voiture() {
        $carList = Voiture::where('active', '=', true)->latest()->get();
        return view('shared.voiture', compact(
            'carList'
        ));
    }

    public function voitureDetails($car) {
        $carData = Voiture::where([
            ['active', '=', true],
            ['id',     '=', $car],
        ])->take(1)->get();

        $carData = (count($carData) > 0) ? $carData[0] : null;
        // return $carData;
        return view('user.details-voiture', compact(
            'carData'
        ));
    }

    public function checkAvailable($id) {
        request()->validate([
            'dateDebut'  => 'required',
            'dateFin'    => 'required',
        ]);

        $check = Reservation::where([
            ['active', '=', true],
            ['id_car', '=', $id],
            ['date_start', '<=', request('dateDebut')],
            ['date_end', '>=', request('dateFin')],
        ])->get();

        // return request('dateDebut');
        // return $check;

        //voiture occupe
        if(count($check) > 0) {
            //chercher les voitures libre a l'heure la et proposer
            $featedID = [];
            foreach($check as $louer) {
                array_push($featedID, $louer['id_car']);
            }

            $free = Voiture::where('active', true)->whereNotIn('id', $featedID)->get();

            return back()->with('checkStatus', 'OCCUPE')->with('freeCar', $free);
        }
        else{
            session(['dateDebut' => request('dateDebut')]);
            session(['dateFin'   => request('dateFin')]);
            return back()->withInput(request()->input())->with('checkStatus', 'LIBRE');
        }
    }

    public function validerLocation($id) {
        $car = Voiture::where([
            ['active', '=', true],
            ['id', '=', $id],
        ])->get();

        $days = round((strtotime(session('dateFin')) - strtotime(session('dateDebut'))) / 86400);

        $car = (count($car) > 0) ? $car[0] : null;

        return view('user.valider-location', compact(
            'car',
            'days'
        ));
    }

    public function finale($id_car) {
        Reservation::create([
            'id_user'    => Auth::user()['id'],
            'id_car'     => $id_car,
            'date_start' => session('dateDebut'),
            'date_end'   => session('dateFin'),
        ]);
        return redirect()->route('user.location');
    }

    public function location() {
        $featured = Voiture::leftjoin('reservations', 'voitures.id', '=', 'reservations.id_car')
        ->where([
            ['reservations.active', '=', true],
            ['reservations.id_user', '=', Auth::user()['id']],
        ])
        ->get();
        return view('user.mes-locations', compact(
            'featured'
        ));
    }

    public function rendre($id, $d1, $d2) {
        Reservation::where([
            ['id_car', '=', $id],
            ['id_user', '=', Auth::user()['id']],
            ['date_start', '=', $d1],
            ['date_end', '=', $d2],
            ['active', '=', true]
        ])->update([
            'active' => false
        ]);
        return redirect()->route('user.location');
    }
}
