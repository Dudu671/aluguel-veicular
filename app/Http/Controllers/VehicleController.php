<?php

namespace App\Http\Controllers;

use App\events;
use App\Models\Vehicle;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller {
    public function index() {
        $vehicles = DB::table('vehicles')
            ->join('users', 'vehicles.owner_id', '=', 'users.id')
            ->select('vehicles.*', 'users.name')
            ->where('vehicles.available', 1)
            ->get();

        return view('vehicles.list', ['vehicles' => $vehicles]);
    }

    public function renteds() {
        $vehicles = DB::table('vehicles')
            ->join('users', 'vehicles.owner_id', '=', 'users.id')
            ->join('rents', 'vehicles.id', '=', 'rents.vehicle_id')
            ->select('vehicles.*', 'users.name', 'rents.id AS rent_id', 'rents.client_id')
            ->get();

        return view('vehicles.renteds', ['vehicles' => $vehicles]);
    }

    public function newForm() {
        return view('vehicles.form');
    }

    public function new(Request $request) {
        $fileName = null;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $name = uniqid(date('HisYmd'));

            $extension = $request->image->extension();
            $fileName = "{$name}.{$extension}";

            $request->image->storeAs('public/vehicles', $fileName);

            $id = Auth::id();

            $vehicle = new Vehicle([
                'model' => $request->input('model'),
                'year' => $request->input('year'),
                'day_price' => $request->input('day_price'),
                'image_path' => $fileName,
                'owner_id' => $id
            ]);

            $vehicle->save();
        }

        return redirect()->route('vehicles.index');
    }

    public function edit($id) {
        if (!$vehicle = Vehicle::find($id)) {
            return redirect()->back();
        }

        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, $id) {
        if (!$vehicle = Vehicle::find($id)) {
            return redirect()->back();
        }

        $vehicle->update($request->all());

        return redirect()->route('vehicles.index')->with('message', 'O registro foi editado.');
    }

    public function destroy($id) {
        if (!$vehicle = Vehicle::find($id)) {
            return redirect()->back();
        }

        $vehicle->delete();
        unlink(public_path('/storage/vehicles/' . $vehicle->image_path));

        return redirect()->route('vehicles.index')->with('message', 'O registro foi excluído.');
    }
}
