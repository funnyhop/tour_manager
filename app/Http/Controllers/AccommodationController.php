<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accommodation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AccommodationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $accommodation;
    public function __construct(){
        $this->accommodation = new Accommodation();
    }
    public function index()
    {
        $list = $this->accommodation->accommodations();
        $tours = DB::table('tours')->get()->all();
        $locations = DB::table('locations')->get()->all();
        $hotels = DB::table( 'hotels' )->get()->all();
        return view('Tour.accommodation', compact('list', 'tours','locations','hotels'));
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
            'hotel_id' => 'required',
            'date_of_tour' => 'required',
        ]);

        $date_of_tour = $this->formatDate($request->input('date_of_tour'));

        $accommodation = DB::table('accommodations')->insert([
            'date_of_tour' => $date_of_tour,
            'tour_id' => $request->input('tour_id'),
            'location_id' => $request->input('location_id'),
            'hotel_id'=>$request->input('hotel_id') ,
        ]);

        return redirect()->route('accommodation');
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
    public function show(string $tour_id, $location_id, $hotel_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $tour_id, $location_id, $hotel_id)
    {
        $tours = DB::table('tours')->get()->all();
        $locations = DB::table('locations')->get()->all();
        $hotels = DB::table( 'hotels' )->get()->all();
        $accommodation = DB::table('accommodations')->select('tour_id' , 'location_id','hotel_id', 'date_of_tour')
        ->where('tour_id', $tour_id)
        ->where('location_id', $location_id)
        ->where('hotel_id', $hotel_id)
        ->first();

        return view('Tour.accommodation_edit', [
            'accommodation'=>$accommodation,
            'tours' => $tours,
            'locations' => $locations,
            'hotels' => $hotels,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $tour_id, $location_id, $hotel_id)
    {
        $request->validate([
            'tour_id' => 'required',
            'location_id' => 'required',
            'hotel_id' => 'required',
            'date_of_tour' => 'required',
        ]);

        $date_of_tour = $this->formatDate($request->input('date_of_tour'));

        $accommodation = DB::table('accommodations')
        ->where('tour_id', $tour_id)
        ->where('location_id', $location_id)
        ->where('hotel_id', $hotel_id)
            ->update([
                'tour_id' => $request->input('tour_id'),
                'location_id' => $request->input('location_id'),
                'hotel_id'=>$request->input('hotel_id') ,
                'date_of_tour' => $date_of_tour,
            ]);
        return redirect()->route('accommodation');
    }

    /**
     * Reaccommodation the specified resource from storage.
     */
    public function destroy( $tour_id, $location_id, $hotel_id)
    {
        $accommodation = DB::table('accommodations')
        ->where('tour_id', $tour_id)
        ->where('location_id', $location_id)
        ->where('hotel_id', $hotel_id);

        $accommodation->delete();
        return redirect()->route('accommodation');
    }
}
