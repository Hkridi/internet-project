<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    //
    public function index()
    {
        $loans = Loan::all();
        return view('admin-side.loans.index', [
            'loans' => $loans
        ]);
    }

    public function pending()
    {
        $loans = Loan::all();
        return view('admin-side.loans.pending', [
            'loans' => $loans
        ]);
    }

    public function overdue()
    {
        $loans = Loan::all();
        return view('admin-side.loans.overdue', [
            'loans' => $loans
        ]);
    }

    public function create()
    {
        $users = User::all();
        $books = Book::all();
        return view('admin-side.loans.create', [
            'users' => $users,
            'books' => $books,
        ]);
    }

    public function store(Request $request)
    {
        $data = new Loan();
        $data->user_id = $request->user_id;
        $data->book_id = $request->book_id;
        $data->save();
        return redirect()->route('admin.loans');
    }

    public function show($id)
    {
        $loan = Loan::find($id);
        return view('admin-side.loans.show', [
            'loan' => $loan
        ]);
    }

    public function active($id)
    {
        $loan = Loan::find($id);
        $loan->due_date = Carbon::now()->addDays(15);
        $loan->status = "active";
        $loan->save();
        return redirect()->route('admin.loans');
    }

    public function reject($id)
    {
        $loan = Loan::find($id);
        $loan->status = "rejected";
        $loan->save();
        return redirect()->route('admin.loans');
    }

    public function return($id)
    {
        $loan = Loan::find($id);
        $loan->return_date = Carbon::now();
        $loan->status = "returned";
        $loan->save();
        return redirect()->route('admin.loans');
    }
}
