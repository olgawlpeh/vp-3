@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">


                    <div class="panel-heading">Список заказов</div>
                    <table class="table table-bordered">
                        @foreach($order_games as $order_game)
                            <tr>
                                <td>{{$order_game->id}}</td>
                                <td>{{$order_game->order_id}}</td>
                                <td>{{$order_game->game_id}}</td>
                                <td>

                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
