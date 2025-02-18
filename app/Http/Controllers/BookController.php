<?php

namespace App\Http\Controllers;

use App\DTO\BookDTO;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App\Http\Resources\BookResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\SearchBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Interfaces\Services\BookServiceInterface;

class BookController extends Controller
{
    public function __construct(protected BookServiceInterface $bookService){

    }
    public function index()
    {
        $books = $this->bookService->getAllBooks(10);
        return $this->responsePagination($books, BookResource::collection($books));
    }

    public function store(StoreBookRequest $request)
    {
        $bookDTO = new BookDTO( $request->file('images'), Auth::id(), $request->translations);
        $book = $this->bookService->createBook($bookDTO);
        return $this->success(new BookResource($book), __('successes.book.created'), 201);
    }

    public function show(string $id)
    {
        $book = $this->bookService->getBookById($id);
        return $this->success(new BookResource($book->load('images')));
    }

    public function update(UpdateBookRequest $request, string $id)
    {
        $bookDTO = new BookDTO($request->file('images'), Auth::id(), $request->translations);
        $book = $this->bookService->updateBook($bookDTO, $id);
        return $this->success(new BookResource($book), __('successes.book.updated'));

    }

    public function destroy(string $id)
    {
        $this->bookService->deleteBook($id);
        return $this->success([], __('successes.book.deleted'), 204);
    }
    // TODo add search and filter for book
}
