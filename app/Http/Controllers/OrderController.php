<?php

namespace App\Http\Controllers;

use App\Mail\OrderCompleted;
use App\Mail\OrderIn;
use App\Mail\OrderOut;
use App\Models\Game;
use App\Models\Order;
use App\Models\OrderGame;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function buy(int $id)
    {
        $game = Game::query()->find($id);

        if (!$game) {
            return redirect()->route('home');
        }

        $currentOrder = Order::getCurrentOrder(Auth::id());

        if (!$currentOrder) {
            ($currentOrder = new Order([
                'user_id' => Auth::id(),
                'state' => Order::STATE_CURRENT
            ]))->save();
        }

        (new OrderGame(['order_id' => $currentOrder->id, 'game_id' => $id]))->save();

        return redirect()->route('order.current');
    }
    public function current()
    {
        $order = Order::getCurrentOrder(Auth::id());

        return view('order.current', [
            'games' => $order->games ?? [],
            'sum' => $order ? $order->getSum() : 0
        ]);
    }
    public function process()
    {
        $currentOrder = Order::getCurrentOrder(Auth::id());

        if (!$currentOrder) {
            return redirect()->route('home');
        }

       Mail::to(User::query()->find(1))->send(new OrderIn($currentOrder, Auth::user()));
//       Mail::to(User::query()->find(1))->send(new OrderOut($currentOrder, Auth::user()));


        /** @var Order $currentOrder */
        $currentOrder->saveAsProcessed();

        return view('order.completed');

    }


}


