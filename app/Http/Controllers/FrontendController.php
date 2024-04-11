<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $tour;
    public function __construct(){
        $this->tour = new Tour();
    }
    public function index()
    {
        $list = $this->tour->tours();
        return view('frontend.home', compact('list'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tour = DB::table('tours')->select('id', 'name' , 'description', 'start_time', 'end_time', 'start_date', 'end_date', 'image', 'outstanding', 'price')->where('id', $id)->first();
        return view('frontend.details')-> with(['tour'=>$tour]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
