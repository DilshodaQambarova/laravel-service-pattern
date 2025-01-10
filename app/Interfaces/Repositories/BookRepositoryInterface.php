<?php

namespace App\Interfaces\Repositories;

interface BookRepositoryInterface
{
    public function getAllBooks($num);
    public function getBookById($id);
    public function updateBook($data, $id);
    public function deleteBook($id);
    public function createBook($data);
    public function filterBook($filters);
    public function searchBook($q);


}
