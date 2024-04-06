<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee_position extends Model
{
    use HasFactory;
    protected $table='employee_positions';
    protected $primaryKey = ['employee_id', 'office_id'];
    protected $fillable = ['employee_id', 'office_id', 'effective'];
    // protected $keyType = 'integer';
    // protected $keyType = 'string';

    public function employee_positions(){
        $employee_positions = DB::table('employee_positions')->select('employee_id', 'office_id', 'effective')->get();
        return $employee_positions;
    }
}
