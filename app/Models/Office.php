<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Office extends Model
{
    use HasFactory;
    protected $table='offices';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name'];
    // protected $keyType = 'integer';
    // protected $keyType = 'string';

    public function offices(){
        $offices = DB::table('offices')->select('id', 'name')
            ->orderByDesc('id')
            ->get();
        return $offices;
    }
}
