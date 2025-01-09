<?php

namespace App\Repositories;

use App\Events\AttachmentEvent;
use App\Filters\BookFilter;
use App\Interfaces\Repositories\BookRepositoryInterface;
use App\Models\Book;
use App\Services\AttachmentService;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Auth;

class BookRepository implements BookRepositoryInterface
{
    use ResponseTrait;
    public function __construct(protected AttachmentService $attachmentService)
    {

    }
    public function getAllBooks($num)
    {
        return Auth::user()
            ->books()
            ->with(['translations', 'images', 'author'])
            ->paginate($num);

    }
    public function createBook($data)
    {
        $book = new Book();
        $book->user_id = $data['user_id'];
        $book->fill($data['translations']);
        $book->save();
        event(new AttachmentEvent($data['images'], $book->images()));
        return $book->load(['images', 'author']);
    }
    public function getBookById($id)
    {
        $book = Auth::user()->books()->with('translations')->findOrFail($id);
        return $book->load(['author', 'images']);
    }
    public function updateBook($data, $id)
    {
        $book = Book::findOrFail($id);
        $book->fill($data['translations']);
        $book->save();
        if ($data['images']) {
            if ($book->images) {
                $this->attachmentService->destroy($book->images);
            }
            event(new AttachmentEvent($data['images'], $book->images()));
        }
        return $book->load(['images', 'author']);
    }
    public function deleteBook($id)
    {
        $book = Auth::user()->books()->findOrFail($id);
        if(Auth::id() !== $book->user_id){
            return $this->error(__('errors.book.forbidden'), 403);
        }
        $this->attachmentService->destroy($book->images);
        $book->delete();
        return $book;
    }
    public function filterBook($filters){
        $filter = new BookFilter();
        $query = Book::query();
        $filteredBooks = $filter->apply($query, $filters);
        return $filteredBooks;
    }

}
