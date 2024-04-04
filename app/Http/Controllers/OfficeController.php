<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $office;
    public function __construct(){
        $this->office = new Office();
    }
    public function index()
    {
        $list = $this->office->offices();
        return view('Company_structure.office', compact('list'));
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

        $office = Office::create([
            'name' => $request->input('name'),
        ]);

        $office->save();
        return redirect()->route('office');
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
        $office = DB::table('offices')->select('id', 'name')->where('id', $id)->first();
        return view('Company_structure.office_edit') -> with(['office'=>$office]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $office = DB::table('offices')->where('id', $id)
            ->update([
                'name' => request()->input('name'),
            ]);
        return redirect()->route('office');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $office = DB::table('offices')->where('id', $id);
        $office->delete();
        return redirect()->route('office');
    }
}
