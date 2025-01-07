<?php

namespace App\Http\Controllers;

use App\DTO\BookDTO;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App\Http\Resources\BookResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Interfaces\Services\BookServiceInterface;

class BookController extends Controller
{
    use ResponseTrait;
    public function __construct(protected BookServiceInterface $bookService){

    }
    public function index()
    {
        $books = $this->bookService->getAllBooks(10);
        return $this->responsePagination($books, BookResource::collection($books->load('images')));
    }

    public function store(StoreBookRequest $request)
    {
        $bookDTO = new BookDTO( $request->file('images'), Auth::id(), $request->translations);
        $book = $this->bookService->createBook($bookDTO);
        // return $this->success(new BookResource($book->load('images')), 'Book created successfully', 201);
    }

    public function show(string $id)
    {
        //
    }

    public function update(UpdateBookRequest $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
