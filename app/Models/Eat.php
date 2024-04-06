<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Eat extends Model
{
    use HasFactory;
    protected $table='eats';
    protected $primaryKey = ['tour_id', 'location_id','restaurant_id', 'date_of_tour'];
    protected $fillable = ['tour_id', 'location_id', 'restaurant_id', 'date_of_tour'];
    // protected $keyType = 'integer';
    // protected $keyType = 'string';

    public function eats(){
        $eats = DB::table('eats')->select('tour_id', 'location_id', 'restaurant_id', 'date_of_tour')->get();
        return $eats;
    }
}
