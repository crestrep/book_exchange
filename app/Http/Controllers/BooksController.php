<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Http\Requests\BookRequest;
use App\Http\Requests;
use Validator;
use Laracasts\Flash\Flash;
use Auth;

class BooksController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->buscar;

        if(!$search)
            $search = '';

        $books = Book::Search($search)
                    ->Where('user_id',Auth::user()->id)
                    ->get();

        return view('libros.index')
                ->with('books',$books)
                ->with('search', $search);
    }

    public function create()
    {
        return view('libros.create');
    }

    public function store(BookRequest $request)
    {
        $book = new Book($request->all());

        $book->user_id = Auth::user()->id;
        $book->available = $request->quantity;

        $book->save();

        Flash::success("Se ha creado el equipo: ". $book->name);
        return redirect()->route('app.books.index');
    }

    public function edit($id)
    {
        $book = Book::FindOrFail($id);

        return view('libros.edit')
                ->with('book', $book);
    }

    public function update(BookRequest $request, $id)
    {
        $book = Book::FindOrFail($id);

        $book->available = $request->quantity - $book->quantity ;

        $book->fill($request->all());

        $book->save();

        Flash::success("Se ha actualizado el libro: ". $book->name);
        return redirect()->route('app.books.index');
    }

    public function destroy()
    {

    }

    public function detail(Request $request)
    {
        if($request->ajax())
        {

            $book = Book::FindOrFail($request->id);
            $user = $book->user;

            return response()->json(array('data'=>$book,'user'=>$user));

        }

    }
}
