<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    use HasFactory;
    protected $table='vehicles';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'type'];
    // protected $keyType = 'integer';
    // protected $keyType = 'string';

    public function vehicles(){
        $vehicles = DB::table('vehicles')->select('id', 'name', 'type')
            ->orderByDesc('id')
            ->get();
        return $vehicles;
    }
}
