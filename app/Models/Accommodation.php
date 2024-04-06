<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Accommodation extends Model
{
    use HasFactory;
    protected $table='accommodations';
    protected $primaryKey = ['tour_id', 'location_id','hotel_id', 'date_of_tour'];
    protected $fillable = ['tour_id', 'location_id', 'hotel_id', 'date_of_tour'];
    // protected $keyType = 'integer';
    // protected $keyType = 'string';

    public function accommodations(){
        $accommodations = DB::table('accommodations')->select('tour_id', 'location_id', 'hotel_id', 'date_of_tour')->get();
        return $accommodations;
    }
}
