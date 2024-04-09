<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Opject extends Model
{
    use HasFactory;
    protected $table='opjects';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'type'];
    // protected $keyType = 'integer';
    // protected $keyType = 'string';

    public function opjects(){
        $opjects = DB::table('opjects')->select('id', 'type')
            ->orderByDesc('id')
            ->get();
        return $opjects;
    }
}
