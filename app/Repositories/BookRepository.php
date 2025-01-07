<?php

namespace App\Repositories;

use App\Events\AttachmentEvent;
use App\Models\Book;
use App\Services\AttachmentService;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\Repositories\BookRepositoryInterface;

class BookRepository implements BookRepositoryInterface
{
    public function __construct(protected AttachmentService $attachmentService){

    }
    public function getAllBooks($num){
        return Auth::user()->books()->with('user')->paginate($num);
    }
    public function createBook($data){
        $book = new Book();
        $book->user_id = $data['user_id'];
        $book->fill($data['translations']);
        $book->save();
        event(new AttachmentEvent($data['images']));
        return $book->with('user');
    }
    public function getBookById($id){

    }
    public function updateBook($data, $id){

    }
    public function deleteBook($id){

    }
}
