<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $vehicle;
    public function __construct(){
        $this->vehicle = new Vehicle();
    }
    public function index()
    {
        $list = $this->vehicle->vehicles();
        return view('vedicle', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'name' => 'required|string',
        ]);

        $vehicle = Vehicle::create([
            'type' => $request->input('type'),
            'name' => $request->input('name'),
        ]);

        $vehicle->save();
        return redirect()->route('vehicle');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vehicle = DB::table('vehicles')->select('id', 'name', 'type')->where('id', $id)->first();
        return view('vehicle_edit') -> with(['vehicle'=>$vehicle]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'type' => 'required|string',
            'name' => 'required|string',
        ]);

        $vehicle = DB::table('vehicles')->where('id', $id)
            ->update([
                'type' => request()->input('type'),
                'name' => $request->input('name'),
            ]);
        return redirect()->route('vehicle');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehicle = DB::table('vehicles')->where('id', $id);
        $vehicle->delete();
        return redirect()->route('vehicle');
    }
}
