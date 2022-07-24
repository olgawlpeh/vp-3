@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <a href="{{route('categories.create')}}">добавить</a>

                    <div class="content-middle">
                        Список категорий...
                    </div>
                    <table class="table table-bordered">
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->title}}</td>
                                <td>{{$category->description}}</td>
                                <td>
                                    <a href="{{route('categories.edit', ['id' => $category->id])}}">edit</a>
                                    <a href="{{route('categories.delete', ['id' => $category->id])}}">delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
