<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Voiture;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $carList = Voiture::latest()->get();
        return view('admin.index', [
            'carList' => $carList
        ]);
    }

    public function create_view() {
        return view('admin.create');
    }

    public function create_back() {
        $data = request()->validate([
            'name'          => 'required',
            'price'         => 'required',
            'image'         => 'required | image',
            'description'   => 'required',
        ]);

        $path = request('image')->store('car_images');
        request('image')->move('car_images', $path);

        $data['image'] = $path;

        Voiture::create($data);

        return redirect()->route('admin.index');
    }

    public function share($car) {
        Voiture::where('id', '=', $car)->update(['active' => true]);
        return redirect()->route('admin.index');
    }

    public function unshare($car) {
        Voiture::where('id', '=', $car)->update(['active' => false]);
        return redirect()->route('admin.index');
    }

    public function delete($car) {
        Voiture::where('id', '=', $car)->delete();
        return redirect()->route('admin.index');
    }

    public function edit_view($car) {
        $toUpadate = Voiture::where('id', '=', $car)->get()->take(1);
        $toUpadate = (count($toUpadate) > 0) ? $toUpadate[0] : null;
        return view('admin.edit', [
            'toUpadate' => $toUpadate
        ]);
    }

    public function edit_back() {
        $data = request()->validate([
            'name'          => 'required',
            'price'         => 'required',
            'description'   => 'required',
            'id'            => 'required'
        ]);

        $path = "";
        if(request('image')) {
            $path = request('image')->store('car_images');
            request('image')->move('car_images', $path);
            $data['image'] = $path;

            Voiture::where('id', '=', request('id'))->update([
                'name'          => $data['name'],
                'price'         => $data['price'],
                'description'   => $data['description'],
                'image'         => $data['image'],
            ]);

            return redirect()->route('admin.index');
        }

        Voiture::where('id', '=', request('id'))->update([
            'name'          => $data['name'],
            'price'         => $data['price'],
            'description'   => $data['description'],
        ]);

        return redirect()->route('admin.index');
    }

    public function liste() {
        $emprunteurs = User::leftjoin('reservations', 'users.id', '=', 'reservations.id_user')
        ->where([
            ['reservations.active', '=', true],
        ])
        ->leftjoin('voitures', 'voitures.id', '=', 'reservations.id_car')
        ->get(['users.name AS username', 'voitures.name AS carname', 'reservations.date_start', 'reservations.date_end']);

        // return $emprunteurs;
        return view('admin.liste', compact(
            'emprunteurs'
        ));
    }
}
