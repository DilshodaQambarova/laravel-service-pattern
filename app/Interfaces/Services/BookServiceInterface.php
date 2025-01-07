<?php

namespace App\Interfaces\Services;

interface BookServiceInterface
{
    public function getAllBooks($num);
    public function getBookById($id);
    public function updateBook($bookDTO, $id);
    public function deleteBook($id);
    public function createBook($bookDTO);
    public function search($q, $query, $filters);
    public function filter($query, $filters);
}
