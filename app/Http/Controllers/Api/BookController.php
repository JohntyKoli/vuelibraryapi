<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Books;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Carbon\Carbon;



class BookController extends BaseController
{

    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }

    public function index(Request $request)
    {
        $books = Books::getBooks();
        return $this->sendResponse($books, 'All Books');
    }

    public function create(Request $request)
    {
        dd("Book create");
    }

    public function store(BookRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->sendError('Validation failed', $request->validator->messages(), 200);
        }
        $book = Books::create($request->validated());
        return $this->sendResponse($book, 'Book Added Successfully');
    }


    public function show(Books $book)
    {
        return $this->sendResponse($book, 'Book Details');
    }

    public function update(BookRequest $request, Books $book)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->sendError('Validation failed', $request->validator->messages(), 403);
        }
        $book->update($request->validated());
        return $this->sendResponse($book->refresh(), 'Book Updated Successfully');
    }

    public function destroy(Books $book)
    {
        $book->delete();
        return $this->sendResponse(null, 'Book Deleted Successfully');

    }
}