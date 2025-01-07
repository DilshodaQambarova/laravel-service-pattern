<?php

namespace App\Http\Controllers;

use App\Traits\ResponseTrait;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class Controller
{
    use ResponseTrait;

}
