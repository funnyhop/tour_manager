<?php

namespace App\Http\Controllers;

use App\Models\Opject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OpjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $opject;
    public function __construct(){
        $this->opject = new Opject();
    }
    public function index()
    {
        $list = $this->opject->opjects();
        return view('opject', compact('list'));
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
        ]);

        $opject = Opject::create([
            'type' => $request->input('type'),
        ]);

        $opject->save();
        return redirect()->route('opject');
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
        $opject = DB::table('opjects')->select('id', 'type')->where('id', $id)->first();
        return view('opject_edit') -> with(['opject'=>$opject]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'type' => 'required|string',
        ]);

        $opject = DB::table('opjects')->where('id', $id)
            ->update([
                'type' => request()->input('type'),
            ]);
        return redirect()->route('opject');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $opject = DB::table('opjects')->where('id', $id);
        $opject->delete();
        return redirect()->route('opject');
    }
}
