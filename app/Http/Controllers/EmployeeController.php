<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $employee;
    public function __construct(){
        $this->employee = new Employee();
    }
    public function index()
    {
        $list = $this->employee->employees();
        $units =  DB::table('units')->get()->all();
        return view('User_manager.employee', compact('list', 'units'));
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
        // \dd($request);
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|regex:/^0\d{9}$/',
            'gender' => 'required|string',
            'address' => 'required',
            'birthday' => 'required',
            'email' => 'required|email',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[A-Z])(?=.*[a-z]).{8,}$/'
            ],
            'unit_id' => 'required',
            'role' => 'required'
        ]);

        $birthday = $this->formatDate($request->input('birthday'));

        $employee = Employee::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'address' => $request->input('address'),
            // 'birthday' => \DB::raw("STR_TO_DATE('{$request->input('birthday')}', '%m/%d/%Y')"),
            'birthday' => $birthday,
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'unit_id' => $request->input('unit_id'),
            'role' => $request->input('role'),
        ]);

        $employee->save();
        return redirect()->route('employee');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $units =  DB::table('units')->get()->all();
        $employee = DB::table('employees')->select('id', 'name', 'phone', 'gender', 'address', 'birthday', 'email', 'password', 'unit_id', 'role')->where('id', $id)->first();
        return view('User_manager.employee_edit', [
            'employee' => $employee,
            'units' => $units
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|regex:/^0\d{9}$/',
            'gender' => 'required|string',
            'address' => 'required',
            'birthday' => 'required',
            'email' => 'required|email',
            // 'password' => [
            //     'required',
            //     'string',
            //     'min:8',
            //     'regex:/^(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[A-Z])(?=.*[a-z]).{8,}$/'
            // ],
            'unit_id' => 'required',
            'role' => 'required'
        ]);

        $birthday = $this->formatDate($request->input('birthday'));

        $employee = DB::table('employees')->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'gender' => $request->input('gender'),
                'address' => $request->input('address'),
                'birthday' => $birthday,
                // 'birthday' => $request->input('birthday'),
                'email' => $request->input('email'),
                // 'password' => bcrypt($request->input('password')),
                'unit_id' => $request->input('unit_id'),
                'role' => $request->input('role'),
            ]);
        return redirect()->route('employee');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = DB::table('employees')->where('id', $id);
        $employee->delete();
        return redirect()->route('employee');
    }
}
