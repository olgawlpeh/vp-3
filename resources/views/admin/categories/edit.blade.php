@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add category</div>
                <form action="{{route('categories.save', ['id' => $category->id])}}" method="post">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <td>title</td>
                            <td>
                                <input type="text" name="title" value="{{$category->title}}">
                                @if ($errors->has('title'))
                                    <div class="alert alert-danger">{{$errors->first('title')}}</div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>description</td>
                            <td>
                                <input type="text" name="description" value="{{$category->description}}">
                                @if ($errors->has('description'))
                                    <div class="alert alert-danger">{{$errors->first('description')}}</div>
                                @endif
                            </td>
                        </tr>
                    </table>
                    <input type="submit" value="сохранить">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
