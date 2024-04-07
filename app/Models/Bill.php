<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bill extends Model
{
    use HasFactory;
    protected $table='bills';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'total', 'created_at', 'order_id', 'employee_id'];
    // protected $keyType = 'integer';
    // protected $keyType = 'string';

    public function bills(){
        $bills = DB::table('bills')->select('id', 'total', 'created_at', 'order_id', 'employee_id')->get();
        return $bills;
    }
}
