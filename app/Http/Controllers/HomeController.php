<?php

namespace App\Http\Controllers;

use Auth;
use App\Book;
use App\Exchange;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::Where('user_id',Auth::user()->id)
                        ->with('exchange')
                        ->get();

        $exchange = Exchange::Where('user_id',Auth::user()->id)
                        ->get();

        $solicitudes = 0;
        foreach($books as $book)
        {
            $solicitudes = $book->exchange->count() + $solicitudes;
        }

        return view('home')
                ->with('solicitudes', $solicitudes)
                ->with('exchange',$exchange)
                ->with('books', $books);
    }
}
