<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $fillable = ['stock_code', 'stock_name', 'stock_category', 'price', 'qty'];
    protected $table = 'barangs';
    public $timestamps = false;
}
