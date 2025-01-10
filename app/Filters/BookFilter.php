<?php

namespace App\Filters;

class BookFilter
{
    public function apply($query, $filters){
        if($filters && $filters['title']){
            $query->where('translations', $filters['title']);
        }
        return $query;
    }
}
