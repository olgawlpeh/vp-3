<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const STATE_CURRENT = 1;
    const STATE_PROCESSED = 2;

    protected $fillable = ['user_id', 'state'];

    private static $currentOrder = false;

    public function games()
    {
        return $this->belongsToMany(
            Game::class,
            'order_games',
            'order_id',
            'game_id'
        );
    }

    public function getSum(): int
    {
        $sum = 0;
        /** @var Game $game */
        foreach ($this->games as $game) {
            $sum += $game->price;
        }

        return (int) $sum;
    }

    public static function getCurrentOrder(int $id)
    {
        if (self::$currentOrder === false) {
            self::$currentOrder = self::query()
                ->where('user_id', '=', $id)
                ->where('state', '=', Order::STATE_CURRENT)
                ->first();
        }
        return self::$currentOrder;
    }

    public function saveAsProcessed()
    {
        $this->state = self::STATE_PROCESSED;
        return $this->save();
    }
}
