@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <a href="{{route('games.create')}}">добавить</a>

                    <div class="content-middle">
                        Список товаров...
                    </div>
                    <table class="table table-bordered">
                        @foreach($games as $game)
                            <tr>
                                <td>{{$game->id}}</td>
                                <td>{{$game->title}}</td>
                                <td>{{$game->description}}</td>
                                <td>{{$game->price}}</td>
                                <td>
                                    <a href="{{route('games.edit', ['id' => $game->id])}}">edit</a>
                                    <a href="{{route('games.delete', ['id' => $game->id])}}">delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
