<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    protected $table='customers';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'phone', 'gender', 'address', 'birthday', 'email', 'password', 'opject_id', 'created_at'];
    // protected $keyType = 'integer';
    // protected $keyType = 'string';

    public function customers(){
        $customers = DB::table('customers')->select('id', 'name', 'phone', 'gender', 'address', 'birthday', 'email', 'password', 'opject_id', 'created_at')
            ->orderByDesc('id')
            ->get();
        return $customers;
    }
}
