<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Rent;
use Illuminate\Http\Request;

class RentController extends Controller {
    public function newRent(Request $request) {
        $rent = new Rent([
            'vehicle_id' => $request->input('vehicle_id'),
            'client_id' => $request->input('client_id')
        ]);

        $vehicle = Vehicle::find($request->input('vehicle_id'));
        $vehicle->where('id', $request->input('vehicle_id'))->update(['available' => 0]);

        $rent->save();

        return redirect()->route('vehicles.index');
    }

    public function destroy($id) {
        if (!$rent = Rent::find($id)) {
            return redirect()->back();
        }

        $vehicle = Vehicle::find($rent->vehicle_id);
        $vehicle->where('id', ($rent->vehicle_id))->update(['available' => 1]);

        $rent->delete();

        return redirect()->route('vehicles.index')->with('message', 'O registro foi excluído.');
    }
}
