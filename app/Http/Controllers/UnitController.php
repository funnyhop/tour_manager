<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $unit;
    public function __construct(){
        $this->unit = new Unit();
    }
    public function index()
    {
        $list = $this->unit->units();
        return view('Company_structure.unit', compact('list'));
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
            'phone' => 'required|regex:/^0\d{9}$/',
            'fax' => 'required|numeric|max:9999999999',
            'thue' => 'required|string',
        ]);

        $unit = Unit::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'fax' => $request->input('fax'),
            'thue' => $request->input('thue'),
        ]);
        // \dd($unit);
        $unit->save();
        return redirect()->route('unit');
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
        $unit = DB::table('units')->select('id', 'name' , 'phone', 'fax', 'thue')->where('id', $id)->first();
        return view('Company_structure.unit_edit') -> with(['unit'=>$unit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|regex:/^0\d{9}$/',
            'fax' => 'required|numeric|max:9999999999',
            'thue' => 'required|string',
        ]);

        $unit = DB::table('units')->where('id', $id)
            ->update([
                'name' => request()->input('name'),
                'phone' => request()->input('phone'),
                'fax' => request()->input('fax'),
                'thue' => request()->input('thue'),
            ]);
        return redirect()->route('unit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unit = DB::table('units')->where('id', $id);
        $unit->delete();
        return redirect()->route('unit');
    }
}
