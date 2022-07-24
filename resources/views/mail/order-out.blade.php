<? /**  @var \App\Models\User $user */ ?>
<? /**  @var \App\Models\Order $order */ ?>

Ваш заказ принят, ожидайте звонка: <br>

<br>
@forelse($order->games as $game)
    {{ $game->id }} {{ $game->title }}
@empty
    Нет товаров в заказе
@endforelse
