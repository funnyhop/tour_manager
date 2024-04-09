<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;
    protected $table='locations';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name' , 'service', 'price'];
    // protected $keyType = 'integer';
    // protected $keyType = 'string';

    public function locations(){
        $locations = DB::table('locations')->select('id', 'name' , 'service', 'price')
            ->orderByDesc('id')
            ->get();
        return $locations;
    }
}
