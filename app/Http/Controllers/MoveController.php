<?php

namespace App\Http\Controllers;

use App\Models\Move;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MoveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $move;
    public function __construct(){
        $this->move = new Move();
    }
    public function index()
    {
        $list = $this->move->moves();
        $tours = DB::table('tours')->get()->all();
        $locations = DB::table('locations')->get()->all();
        $vehicles = DB::table( 'vehicles' )->get()->all();
        return view('Tour.move', compact('list', 'tours','locations','vehicles'));
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
            'tour_id' => 'required',
            'location_id' => 'required',
            'vehicle_id' => 'required',
            'date_of_tour' => 'required',
        ]);

        $date_of_tour = $this->formatDate($request->input('date_of_tour'));

        $move = DB::table('moves')->insert([
            'date_of_tour' => $date_of_tour,
            'tour_id' => $request->input('tour_id'),
            'location_id' => $request->input('location_id'),
            'vehicle_id'=>$request->input('vehicle_id') ,
        ]);

        return redirect()->route('move');
    }

    private function formatDate($date)
    {
        // Kiểm tra xem ngày tháng có đúng định dạng '%m/%d/%Y' hay không
        if (preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $date)) {
            // Nếu đúng định dạng, chuyển đổi thành định dạng 'Y-m-d'
            return date('Y-m-d', strtotime(str_replace('/', '-', $date)));
        } else {
            // Ngược lại, giữ nguyên giá trị của ngày tháng
            return $date;
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $tour_id, $location_id, $vehicle_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $tour_id, $location_id, $vehicle_id)
    {
        $tours = DB::table('tours')->get()->all();
        $locations = DB::table('locations')->get()->all();
        $vehicles = DB::table( 'vehicles' )->get()->all();
        $move = DB::table('moves')->select('tour_id' , 'location_id','vehicle_id', 'date_of_tour')
        ->where('tour_id', $tour_id)
        ->where('location_id', $location_id)
        ->where('vehicle_id', $vehicle_id)
        ->first();

        return view('Tour.move_edit', [
            'move'=>$move,
            'tours' => $tours,
            'locations' => $locations,
            'vehicles' => $vehicles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $tour_id, $location_id, $vehicle_id)
    {
        $request->validate([
            'tour_id' => 'required',
            'location_id' => 'required',
            'vehicle_id' => 'required',
            'date_of_tour' => 'required',
        ]);

        $date_of_tour = $this->formatDate($request->input('date_of_tour'));

        $move = DB::table('moves')
        ->where('tour_id', $tour_id)
        ->where('location_id', $location_id)
        ->where('vehicle_id', $vehicle_id)
            ->update([
                'tour_id' => $request->input('tour_id'),
                'location_id' => $request->input('location_id'),
                'vehicle_id'=>$request->input('vehicle_id') ,
                'date_of_tour' => $date_of_tour,
            ]);
        return redirect()->route('move');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $tour_id, $location_id, $vehicle_id)
    {
        $move = DB::table('moves')
        ->where('tour_id', $tour_id)
        ->where('location_id', $location_id)
        ->where('vehicle_id', $vehicle_id);

        $move->delete();
        return redirect()->route('move');
    }
}
