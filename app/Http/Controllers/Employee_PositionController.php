<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee_position;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Employee_PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $employee_position;
    public function __construct(){
        $this->employee_position = new Employee_position();
    }
    public function index()
    {
        $list = $this->employee_position->employee_positions();
        $employees = DB::table('employees')->get()->all();
        $offices = DB::table('offices')->get()->all();

        return view('Company_structure.employee_position', compact( 'list','employees','offices'));
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
            'employee_id' => 'required',
            'office_id' => 'required',
            'effective' => 'required',
        ]);

        $effective = $this->formatDate($request->input('effective'));

        $employee_position = DB::table('employee_positions')->insert([
            'employee_id' => $request->input('employee_id'),
            'office_id' => $request->input('office_id'),
            'effective' => $effective,
        ]);

        return redirect()->route('employee_position');
    }

    private function formatDate($date)
    {
        // Kiểm tra xem ngày tháng có đúng định dạng 'Y-m-d' hay không
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
            // Nếu đúng định dạng 'Y-m-d', không cần chuyển đổi
            return $date;
        } elseif (preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $date)) {
            // Nếu đúng định dạng '%m/%d/%Y', chuyển đổi thành định dạng 'Y-m-d'
            return date('Y-m-d', strtotime($date));
        } else {
            // Ngược lại, giữ nguyên giá trị của ngày tháng
            return null; // hoặc bạn có thể trả về một giá trị mặc định khác tùy thuộc vào logic của bạn
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $employee_id, $office_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $employee_id, $office_id)
    {
        $employees = DB::table('employees')->get()->all();
        $offices = DB::table('offices')->get()->all();
        $employee_position = DB::table('employee_positions')->select('employee_id' , 'office_id', 'effective')
        ->where('employee_id', $employee_id)
        ->where('office_id', $office_id)
        ->first();

        return view('Company_structure.employee_position_edit', [
            'employee_position'=>$employee_position,
            'employees' => $employees,
            'offices' => $offices,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $employee_id, $office_id)
    {
        $request->validate([
            'employee_id' => 'required',
            'office_id' => 'required',
            'effective' => 'required',
        ]);

        $effective = $this->formatDate($request->input('effective'));

        $employee_position = DB::table('employee_positions')
        ->where('employee_id', $employee_id)
        ->where('office_id', $office_id)
            ->update([
                'employee_id' => $request->input('employee_id'),
                'office_id' => $request->input('office_id'),
                'effective' => $effective,
            ]);
        return redirect()->route('employee_position');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $employee_id, $office_id)
    {
        $employee_position = DB::table('employee_positions')
        ->where('employee_id', $employee_id)
        ->where('office_id', $office_id);

        $employee_position->delete();
        return redirect()->route('employee_position');
    }
}
