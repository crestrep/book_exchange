<?php

namespace App\Http\Controllers;

use App\Exchange;
use Illuminate\Http\Request;
use App\Book;
use App\Http\Requests\BookRequest;
use App\Http\Requests;
use Validator;
use Laracasts\Flash\Flash;
use Auth;
use Carbon\Carbon;

class ExchangeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->buscar;

        if(!$search)
            $search = '';

        $books = Book::Search($search)
            ->Where('user_id', '!=', Auth::user()->id)
            ->get();

        return view('intercambio.index')
            ->with('books',$books)
            ->with('search', $search);
    }

    public function store(Request $request)
    {
        $exchange = new Exchange($request->all());

        $book = Book::findOrFail($request->book_id);

        if($book->available == 0) {
            Flash::success("No hay copias disponibles para solicitar este libro");
            return redirect()->route('app.exchange.index');
        }

        $available = $book->available - 1;

        $now = Carbon::now()->format('d/m/Y');

        $exchange->date_ini = $now;
        $exchange->user_id = Auth::user()->id;
        $exchange->state = 'En Espera';

        $exchange->save();
        $book->available = $available;
        $book->save();

        Flash::success("Se ha realizado la solicitud exitosamente");
        return redirect()->route('app.exchange.listado');

    }

    public function listado(Request $request)
    {
        $search = $request->buscar;

        if(!$search)
            $search = '';

        $exchanges = Exchange::Where('user_id', Auth::user()->id)->get();

        return view('solicitudes.index')
                ->with('search', $search)
                ->with('exchanges', $exchanges);
    }

    public function received($id)
    {
        $exchanges = Exchange::findOrFail($id);

        $exchanges->state = "Recibido";

        $exchanges->save();

        Flash::success("Se ha modificado el estado de la solicitud");
        return redirect()->route('app.exchange.listado');

    }

    public function canceled($id)
    {
        $exchanges = Exchange::findOrFail($id);
        $book = Book::findOrFail($exchanges->book_id);

        $available = $book->available + 1;

        $exchanges->delete();

        $book->available = $available;

        $book->save();

        Flash::success("Se ha cancelado la solicitud");
        return redirect()->route('app.exchange.listado');
    }
}
