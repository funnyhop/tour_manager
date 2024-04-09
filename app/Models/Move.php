<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Move extends Model
{
    use HasFactory;
    protected $table='moves';
    protected $primaryKey = ['tour_id', 'location_id','vehicle_id', 'date_of_tour'];
    protected $fillable = ['tour_id', 'location_id', 'vehicle_id', 'date_of_tour'];
    // protected $keyType = 'integer';
    // protected $keyType = 'string';

    public function moves(){
        $moves = DB::table('moves')->select('tour_id', 'location_id', 'vehicle_id', 'date_of_tour')
            ->orderByDesc('tour_id')
            ->get();
        return $moves;
    }
}
