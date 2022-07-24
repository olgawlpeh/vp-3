<?php

namespace App\Http\Controllers;


use App\Http\Requests\BookRequest;

use App\Mail\Test;
use App\Models\Book;
use Barryvdh\Debugbar\Facades\Debugbar as Debugbar;
use Illuminate\Http\Request;


class BookController extends Controller
{
    function index(Request $request)
    {

//        Debugbar::addMeasure('now', LARAVEL_START, microtime(true));


        $books = Book::query()->orderBy('id', 'DESC')->get();
//        Debugbar::addMeasure('now', LARAVEL_START, microtime(true));
        return view('books.list', ['books'=>$books]);
    }

    function create()
    {
        return view('books.create');
    }

    function add(BookRequest $request)
    {

        $book = new Book();
        $book->name = $request->name;
        $book->price = $request->price;
        $book->save();
        return redirect()->route('books');
    }

    function edit(Book $book)
    {
        Mail::to(\Auth::user())->send(new Test(['book' =>$book]));
        return view('books.edit', ['book' => $book]);
    }

    function save(BookRequest $request)
    {
        $book = Book::query()->find($request->id);

        $book->name = $request->name;
        $book->price = $request->price;
        $book->save();
        return redirect()->route('books');
    }

    function delete(Request $request)
    {
        Book::destroy($request->id);
        return redirect()->route('books');
    }

}
