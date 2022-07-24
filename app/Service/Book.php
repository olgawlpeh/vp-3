<?php

namespace App\Service;

use App\Models\Book as BookModel;
use Barryvdh\Debugbar\Facades as Debugbar;

class Book
{
    public static function getRandomBook(&$randId)
    {
        $randId  = mt_rand(1,100);
        $book = BookModel::query()->where('id','=',$randId)->first();
        return $book;

    }


}
