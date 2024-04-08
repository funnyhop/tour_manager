<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='orders';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'tour_id' , 'customer_id', 'status', 'quantity', 'created_at', 'employee_id'];
    protected $attributes = [
        'status' => 0, // Thiết lập giá trị mặc định cho cột 'status' là 0
    ];
    // protected $keyType = 'integer';
    // protected $keyType = 'string';

    // public function orders(){
    //     $orders = DB::table('orders')->select('id', 'tour_id' , 'customer_id', 'status', 'quantity', 'created_at', 'employee_id')->get();
    //     return $orders;
    // }
    public function orders()
    {
        return Order::select('id', 'tour_id', 'customer_id', 'status', 'quantity', 'created_at', 'employee_id')->get();
    }

}
