@extends('layouts.app')

@section('content')
    <div class="content-middle">
        <div class="content-head__container">
            <div class="content-head__title-wrap">
                <? /** @var \App\Models\Category $currentCategory */ ?>
                @if (isset($currentCategory))
                    <div class="content-head__title-wrap__title bcg-title">Товары в категории {{ $currentCategory->title }}</div>
                @else
                    <div class="content-head__title-wrap__title bcg-title">Последние товары</div>
                @endif
            </div>
            <div class="content-head__search-block">
                <div class="search-container">
                    <form class="search-container__form">
                        <input type="text" class="search-container__form__input">
                        <button class="search-container__form__btn">search</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="content-main__container">
            <div class="products-columns">
                <? /** @var \App\Models\Game $game */?>
                @foreach($games as $game)
                    <div class="products-columns__item">
                        <div class="products-columns__item__title-product"><a href="{{route('game', $game->id)}}" class="products-columns__item__title-product__link">{{$game->title}}</a></div>
                        <div class="products-columns__item__thumbnail"><a href="{{route('game', $game->id)}}" class="products-columns__item__thumbnail__link"><img src="../../../public/markup/img/cover/game-{{ $game->getImageId() }}.jpg" alt="Preview-image" class="products-columns__item__thumbnail__img"></a></div>
                        <div class="products-columns__item__description"><span class="products-price">{{ $game->price }} руб</span><a href="{{ route('buy', $game->id) }}" class="btn btn-blue">Купить</a></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="content-footer__container">
        {{$games->links()}}
    </div>
</div>
@endsection

