<?php

namespace App\Dao\Author;

use App\Contracts\Dao\Author\AuthorDaoInterface;
use App\Models\Author;

class AuthorDao implements AuthorDaoInterface
{
    public function getAuthorList()
    {
        $authorList = Author::orderBy('created_at', 'asc')
            ->whereNull('deleted_at')
            ->get();
        return $authorList;
    }
}
