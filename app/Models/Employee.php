<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;
    protected $table='employees';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'phone', 'gender', 'address', 'birthday', 'email', 'password', 'unit_id','role'];
    // protected $keyType = 'integer';
    // protected $keyType = 'string';

    public function employees(){
        $employees = DB::table('employees')->select('id', 'name', 'phone', 'gender', 'address', 'birthday', 'email', 'password', 'unit_id', 'role')->get();
        return $employees;
    }
}
