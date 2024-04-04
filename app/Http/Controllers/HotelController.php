<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $hotel;
    public function __construct(){
        $this->hotel = new Hotel();
    }
    public function index()
    {
        $list = $this->hotel->hotels();
        return view('hotel', compact('list'));
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
        ]);

        $hotel = Hotel::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        $hotel->save();
        return redirect()->route('hotel');
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
        $hotel = DB::table('hotels')->select('id', 'name' , 'description')->where('id', $id)->first();
        return view('hotel_edit') -> with(['hotel'=>$hotel]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $hotel = DB::table('hotels')->where('id', $id)
            ->update([
                'name' => request()->input('name'),
                'description' => request()->input('description'),
            ]);
        return redirect()->route('hotel');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hotel = DB::table('hotels')->where('id', $id);
        $hotel->delete();
        return redirect()->route('hotel');
    }
}
