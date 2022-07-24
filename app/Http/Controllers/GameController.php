<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function game(int $id)
    {
        /** @var Game $game */
        $game = Game::query()->with('category')->find($id);
        return view('game', ['game' => $game]);
    }

    public function category(int $id)
    {
        /** @var Category $category */
        $games = Game::query()->where('category_id', '=', $id)->paginate(6);
        $categories = Category::all();
        return view('home', [
            'games' => $games,
            'categories' => $categories,
            'currentCategory' => Category::find($id)
        ]);

    }

}
