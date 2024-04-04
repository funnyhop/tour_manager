<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $restaurant;
    public function __construct(){
        $this->restaurant = new Restaurant();
    }
    public function index()
    {
        $list = $this->restaurant->restaurants();
        return view('restaurant', compact('list'));
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

        $restaurant = Restaurant::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        $restaurant->save();
        return redirect()->route('restaurant');
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
        $restaurant = DB::table('restaurants')->select('id', 'name' , 'description')->where('id', $id)->first();
        return view('restaurant_edit') -> with(['restaurant'=>$restaurant]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $restaurant = DB::table('restaurants')->where('id', $id)
            ->update([
                'name' => request()->input('name'),
                'description' => request()->input('description'),
            ]);
        return redirect()->route('restaurant');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $restaurant = DB::table('restaurants')->where('id', $id);
        $restaurant->delete();
        return redirect()->route('restaurant');
    }
}
