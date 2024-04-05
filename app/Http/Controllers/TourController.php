<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TourController extends Controller
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
        return view('Tour.tour', compact('list'));
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
            'start_date' => 'required',
            'end_date' => 'required',
            'price' => 'required|numeric',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        // Chuyển đổi định dạng của ngày tháng nếu cần
        $start_date = $this->formatDate($request->input('start_date'));
        $end_date = $this->formatDate($request->input('end_date'));

        // Chuyển định dạng của giờ nếu cần
        $start_time = $this->formatTime($request->input('start_time'));
        $end_time = $this->formatTime($request->input('end_time'));


        $tour = Tour::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            // 'start_date' => \DB::raw("STR_TO_DATE('{$request->input('start_date')}', '%m/%d/%Y')"),
            // 'end_date' => \DB::raw("STR_TO_DATE('{$request->input('end_date')}', '%m/%d/%Y')"),
            'start_date' => $start_date,
            'end_date' => $end_date,
            'start_time' => $start_time,
            'end_time' => $end_time,
            // 'start_time' => $request->input('start_time'),
            // 'end_time' => $request->input('end_time'),
            'price' => $request->input('price'),
            'image' => $request->input('image'),
            'outstanding' => $request->input('outstanding'),
        ]);

        $tour->save();
        return redirect()->route('tour');
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
    private function formatTime($time)
    {
        // Kiểm tra xem giá trị giờ có giây không
        if (strpos($time, ':') !== false && strpos($time, ':', strpos($time, ':') + 1) === false) {
            $time .= ':00'; // Thêm giây vào cuối nếu không tồn tại
        }
        return $time;
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
        $tour = DB::table('tours')->select('id', 'name' , 'description', 'start_time', 'end_time', 'start_date', 'end_date','image', 'outstanding', 'price')->where('id', $id)->first();
        return view('Tour.tour_edit') -> with(['tour'=>$tour]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'start_date' => 'required',
            'end_date' => 'required',
            'price' => 'required|numeric',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $start_date = $this->formatDate($request->input('start_date'));
        $end_date = $this->formatDate($request->input('end_date'));

        $start_time = $this->formatTime($request->input('start_time'));
        $end_time = $this->formatTime($request->input('end_time'));

        $tour = DB::table('tours')->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'start_date' => $start_date,
                'end_date' => $end_date,
                'start_time' => $start_time,
                'end_time' => $end_time,
                'price' => $request->input('price'),
                'image' => $request->input('image'),
                'outstanding' => $request->input('outstanding'),
            ]);
        return redirect()->route('tour');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tour = DB::table('tours')->where('id', $id);
        $tour->delete();
        return redirect()->route('tour');
    }
}
