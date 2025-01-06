<?php

namespace App\Http\Controllers;

use App\Interfaces\Services\BookServiceInterface;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct(protected BookServiceInterface $bookService){

    }
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
