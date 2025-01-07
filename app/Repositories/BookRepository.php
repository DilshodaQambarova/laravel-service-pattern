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
            ->with(['translations', 'images'])
            ->paginate($num);

    }
    public function createBook($data)
    {
        $book = new Book();
        $book->user_id = $data['user_id'];
        $book->fill($data['translations']);
        $book->save();
        event(new AttachmentEvent($data['images'], $book->images()));
        return $book->load('images');
    }
    public function getBookById($id)
    {
        $book = Auth::user()->books()->with('author')->findOrFail($id);
        return $book;
    }
    public function updateBook($data, $id)
    {
        $book = Auth::user()->books()->findOrFail($id);
        $book->fill($data['translations']);
        $book->save();
        if ($data['images']) {
            if ($book->images->apth) {
                $this->attachmentService->destroy($book->images->path);
            }
            event(new AttachmentEvent($data['images'], $book->images()));
        }
        return $book;
    }
    public function deleteBook($id)
    {

    }
}
