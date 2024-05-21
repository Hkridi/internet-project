<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LoanController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthorController;
use Illuminate\Support\Facades\Route;



Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('frontend-side.index');
})->name('home');

Route::get('/authors', function () {
    return view('frontend-side.authors');
});

Route::get('/books', function () {
    return view('frontend-side.authors');
});

Route::get('/categories', function () {
    return view('frontend-side.authors');
});

Route::get('/contact', function () {
    return view('frontend-side.authors');
});

Route::get('/authors', function () {
    return view('frontend-side.authors');
});

Route::middleware(['auth', 'admin'])->get('/admin', function () {
    return view('admin-side.index');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('users');
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'destroy')->name('delete');
        });
    });

    Route::controller(BookController::class)->group(function () {
        Route::get('/books', 'index')->name('books');
        Route::prefix('books')->name('books.')->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'destroy')->name('delete');
        });
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'index')->name('categories');
        Route::prefix('categories')->name('categories.')->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'destroy')->name('delete');
        });
    });

    Route::controller(AuthorController::class)->group(function () {
        Route::get('/authors', 'index')->name('authors');
        Route::prefix('authors')->name('authors.')->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'destroy')->name('delete');
        });
    });

    Route::controller(LoanController::class)->group(function () {
        Route::get('/loans', 'index')->name('loans');
        Route::prefix('loans')->name('loans.')->group(function () {
            Route::get('/pending', 'pending')->name('pending');
            Route::get('/overdue', 'overdue')->name('overdue');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/active/{id}', 'active')->name('active');
            Route::get('/reject/{id}', 'reject')->name('reject');
            Route::get('/return/{id}', 'return')->name('return');
        });
    });

    Route::controller(MessageController::class)->group(function () {
        Route::get('/messages', 'index')->name('messages');
        Route::prefix('messages')->name('messages.')->group(function () {
            Route::get('/new', 'new')->name('new');
            Route::get('/unreplied', 'unreplied')->name('unreplied');
            Route::get('/show/{id}', 'show')->name('show');
            Route::post('/update/{id}', 'update')->name('update');
        });
    });
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/messages', function () {
        return view('messages');
    })->name('messages');
    Route::get('/loans-history', function () {
        return view('loans-history');
    })->name('loans-history');

    /*Route::get('/new-loan', function () {
        return view('new-loan');
    })->name('new-loan');*/

    Route::get('/new-loan', [\App\Http\Controllers\Front\UserController::class, 'newLoan'])->name('new-loan');
    Route::post('/new-loan/store', [\App\Http\Controllers\Front\UserController::class, 'new_loan'])->name('new-loan-store');


    Route::get('/new-message', function () {
        return view('new-message');
    })->name('new-message');
    Route::post('/new-message/store', [\App\Http\Controllers\Front\UserController::class, 'new_message'])->name('new-message-store');
});
