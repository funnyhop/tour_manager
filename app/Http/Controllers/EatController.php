<?php

namespace App\Http\Controllers;

use App\Models\Eat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $eat;
    public function __construct(){
        $this->eat = new Eat();
    }
    public function index()
    {
        $list = $this->eat->eats();
        $tours = DB::table('tours')->get()->all();
        $locations = DB::table('locations')->get()->all();
        $restaurants = DB::table( 'restaurants' )->get()->all();
        return view('Tour.eat', compact('list', 'tours','locations','restaurants'));
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
            'restaurant_id' => 'required',
            'date_of_tour' => 'required',
        ]);

        // $date_of_tour = $this->formatDate($request->input('date_of_tour'));
        $date_of_tour = $request->input('date_of_tour');

        $eat = DB::table('eats')->insert([
            'date_of_tour' => $date_of_tour,
            'tour_id' => $request->input('tour_id'),
            'location_id' => $request->input('location_id'),
            'restaurant_id'=>$request->input('restaurant_id') ,
        ]);

        return redirect()->route('eat');
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
    public function show(string $tour_id, $location_id, $restaurant_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $tour_id, $location_id, $restaurant_id)
    {
        $tours = DB::table('tours')->get()->all();
        $locations = DB::table('locations')->get()->all();
        $restaurants = DB::table( 'restaurants' )->get()->all();
        $eat = DB::table('eats')->select('tour_id' , 'location_id','restaurant_id', 'date_of_tour')
        ->where('tour_id', $tour_id)
        ->where('location_id', $location_id)
        ->where('restaurant_id', $restaurant_id)
        ->first();

        return view('Tour.eat_edit', [
            'eat'=>$eat,
            'tours' => $tours,
            'locations' => $locations,
            'restaurants' => $restaurants,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $tour_id, $location_id, $restaurant_id)
    {
        $request->validate([
            'tour_id' => 'required',
            'location_id' => 'required',
            'restaurant_id' => 'required',
            'date_of_tour' => 'required',
        ]);

        $date_of_tour = $this->formatDate($request->input('date_of_tour'));

        $eat = DB::table('eats')
        ->where('tour_id', $tour_id)
        ->where('location_id', $location_id)
        ->where('restaurant_id', $restaurant_id)
            ->update([
                'tour_id' => $request->input('tour_id'),
                'location_id' => $request->input('location_id'),
                'restaurant_id'=>$request->input('restaurant_id') ,
                'date_of_tour' => $date_of_tour,
            ]);
        return redirect()->route('eat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $tour_id, $location_id, $restaurant_id)
    {
        $eat = DB::table('eats')
        ->where('tour_id', $tour_id)
        ->where('location_id', $location_id)
        ->where('restaurant_id', $restaurant_id);

        $eat->delete();
        return redirect()->route('eat');
    }
}
