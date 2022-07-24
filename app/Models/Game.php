<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getImageId()
    {
        return $this->id % 9 + 1;
    }
}
