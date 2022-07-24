<? /**  @var \App\Models\User $user */ ?>
<? /**  @var \App\Models\Order $order */ ?>

Пользователь {{ $user->id }} заказал следующие товары: <br>

<br>
@forelse($order->games as $game)
    {{ $game->id }} {{ $game->title }}
@empty
    Нет товаров в заказе
@endforelse
