<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;
    protected $table='hotels';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'description'];
    // protected $keyType = 'integer';
    // protected $keyType = 'string';

    public function hotels(){
        $hotels = DB::table('hotels')->select('id', 'name', 'description')
            ->orderByDesc('id')
            ->get();
        return $hotels;
    }
}
