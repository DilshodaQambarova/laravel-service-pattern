<?php

namespace App\Repositories;

use App\Events\AttachmentEvent;
use App\Interfaces\Repositories\BookRepositoryInterface;
use App\Models\Book;
use App\Services\AttachmentService;
use Illuminate\Support\Facades\Auth;

class BookRepository implements BookRepositoryInterface
{
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
        $this->attachmentService->destroy($book->images);
        $book->delete();
        return $book;
    }
    public function search($q, $query, $filters){

    }
    public function filter($query, $filters){
        
    }
}
