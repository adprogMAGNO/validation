<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'isbn' => 'required',
            'published_year' => 'required|date',
        ]);

        $book = new Book();
        $book->title = $request['title'];
        $book->author = $request['author'];
        $book->description = $request['description'];
        $book->isbn = $request['isbn'];
        $book->published_year = $request['published_year'];
        $book->save();

        // return redirect()->back();
        return back()->with('success', 'Data saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['book'] = Book::find($id);
        return view('books.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::find($id);
        $book->title = $request['title'];
        $book->author = $request['author'];
        $book->description = $request['description'];
        $book->isbn = $request['isbn'];
        $book->published_year = $request['published_year'];
        $book->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->to('books');
    }
}