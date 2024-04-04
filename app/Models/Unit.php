<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    use HasFactory;
    protected $table='units';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'phone', 'fax', 'thue'];
    // protected $keyType = 'integer';
    // protected $keyType = 'string';

    public function units(){
        $units = DB::table('units')->select('id', 'name', 'phone', 'fax', 'thue')->get();
        return $units;
    }
    //$key is name="key" trong input type search
    // public function scopeSearch($query, $key) {
    //     // $key = request()->key; // Retrieve the key from the request;
    //     if ($key = request()->key) {
    //         return $query->where('id', 'like', '%' . $key . '%')
    //             ->orWhere('name', 'like', '%' . $key . '%');
    //     }
    //     return $query;
    // }
}
