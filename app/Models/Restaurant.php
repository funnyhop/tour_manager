<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurant extends Model
{
    use HasFactory;
    protected $table='restaurants';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'description'];
    // protected $keyType = 'integer';
    // protected $keyType = 'string';

    public function restaurants(){
        $restaurants = DB::table('restaurants')->select('id', 'name', 'description')->get();
        return $restaurants;
    }
}
