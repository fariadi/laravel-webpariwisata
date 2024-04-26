<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;

    protected $table        = 'order';
    protected $primaryKey   = 'id';
    
    public $timestamps      = false;

    protected $fillable     = [
        'id', 
        'user_id', 
        'order_name', 
        'order_date', 
        'order_quantity', 
        'order_hp', 
        'order_duration', 
        'order_penginapan',
        'order_transportasi',
        'order_makanan'
    ];

}