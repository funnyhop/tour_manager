<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $location;
    public function __construct(){
        $this->location = new Location();
    }
    public function index()
    {
        $list = $this->location->locations();
        return view('location', ['list' => $list]);
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
            'name' => 'required|string',
            'service' => 'required|string',
            'price' => 'required|numeric|max:9999999999',
        ]);

        $location = Location::create([
            'name' => $request->input('name'),
            'service' => $request->input('service'),
            'price' => $request->input('price'),
        ]);

        $location->save();
        return redirect()->route('location');
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
        $location = DB::table('locations')->select('id', 'name' , 'service', 'price')->where('id', $id)->first();
        return view('location_edit') -> with(['location'=>$location]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'service' => 'required|string',
            'price' => 'required|numeric|max:9999999999',
        ]);

        $location = DB::table('locations')->where('id', $id)
            ->update([
                'name' => request()->input('name'),
                'service' => request()->input('service'),
                'price' => request()->input('price'),
            ]);
        return redirect()->route('location');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $location = DB::table('locations')->where('id', $id);
        $location->delete();
        return redirect()->route('location');
    }
}
