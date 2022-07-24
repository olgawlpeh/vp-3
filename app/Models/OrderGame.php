<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderGame extends Model
{
    protected $fillable = ['order_id', 'game_id'];
}
