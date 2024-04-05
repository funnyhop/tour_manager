<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tour extends Model
{
    use HasFactory;
    protected $table='tours';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name' , 'description', 'start_time', 'end_time', 'start_date', 'end_date', 'image', 'outstanding', 'price'];
    // protected $keyType = 'integer';
    // protected $keyType = 'string';

    public function tours(){
        $tours = DB::table('tours')->select('id', 'name' , 'description', 'start_time', 'end_time', 'start_date', 'end_date', 'image', 'outstanding', 'price')->get();
        return $tours;
    }
}
