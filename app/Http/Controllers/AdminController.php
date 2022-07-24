<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\GameRequest;
use App\Models\Category;
use App\Models\Game;
use App\Models\OrderGame;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function categories()
    {

        return view('admin.categories.categories', [
            'categories' => Category::all(),
        ]);
    }

    function category_create()
    {
        return view('admin.categories.create');
    }

    function category_add(CategoryRequest $request)
    {
        $category = new Category();
        $category->title = $request->title;
        $category->description = $request->description;
        $category->save();
        return redirect()->route('admin.categories');
    }

    function category_edit($id)
    {
        $category = Category::query()->find($id);
        return view('admin.categories.edit', ['category' => $category]);
    }

    function category_save(CategoryRequest $request)
    {
        $category = Category::query()->find($request->id);

        $category->title = $request->title;
        $category->description = $request->description;
        $category->save();
        return redirect()->route('admin.categories');
    }

    function category_delete(Request $request)
    {
        Category::destroy($request->id);
        return redirect()->route('admin.categories');
    }

    public function games()
    {

        return view('admin.games.games', [
            'games' => Game::all(),
        ]);
    }

    function game_create()
    {
        return view('admin.games.create');
    }

    function game_add(GameRequest $request)
    {
        $game = new Game();
        $game->title = $request->title;
        $game->description = $request->description;
        $game->price = $request->price;
        $game->save();
        return redirect()->route('admin.games');
    }

    function game_edit($id)
    {
        $game = Game::query()->find($id);
        return view('admin.games.edit', ['game' => $game]);
    }

    function game_save(GameRequest $request)
    {
        $game = Game::query()->find($request->id);

        $game->title = $request->title;
        $game->description = $request->description;
        $game->price = $request->price;
        $game->save();
        return redirect()->route('admin.games');
    }

    function game_delete(Request $request)
    {
        Game::destroy($request->id);
        return redirect()->route('admin.games');
    }



    public function orders()
    {
        return view('admin.orders', [
            'order_games' => OrderGame::all(),
        ]);
    }
}
