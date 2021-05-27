<?php

namespace App\Http\Controllers;

use App\Book;
use App\Services\BookService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    use ApiResponser;    
    
    /**
     * The service to consume the books microservice
     * @var BookService
     */
    public $bookService;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * Return list of books
     * @return Illuminate\Http\Response
     */
    public function index() 
    {
        return $this->successResponse($this->bookService->obtainBooks());
    }

    /**
     * Create new book
     * @return Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        return $this->successResponse($this->bookService->createBook($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtain and show one book
     * @return Illuminate\Http\Response
     */
    public function show($book) 
    {
        return $this->successResponse($this->bookService->obtainBook($book));
    }

    /**
     * Update an existing book
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $book) 
    {
        return $this->successResponse($this->bookService->editBook($request->all(), $book));
    }

    /**
     * Remove an existing book
     * @return Illuminate\Http\Response
     */
    public function destroy($book) 
    {
        return $this->successResponse($this->bookService->deleteBook($book));
    }
}
