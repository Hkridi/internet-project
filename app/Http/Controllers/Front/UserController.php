<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Loan;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function newLoan()
    {
        $books = Book::all();
        return view('new-loan', [
            'books' => $books
        ]);
    }
    public function new_loan(Request $request)
    {
        $data = new Loan();
        $data->user_id = Auth::user()->getId();
        $data->book_id = $request->book_id;
        $data->save();
        return redirect()->route('dashboard');
    }
    public function new_message(Request $request)
    {
        $data = new Message();
        $data->user_id = Auth::user()->getId();
        $data->subject = $request->subject;
        $data->message = $request->message;
        $data->save();
        return redirect()->route('messages');
    }
}
