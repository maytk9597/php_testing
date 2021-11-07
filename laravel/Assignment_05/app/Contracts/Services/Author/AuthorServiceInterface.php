<?php

namespace App\Contracts\Services\Author;

interface AuthorServiceInterface
{
    /**
     * To get author list
     * @return array $authorList Author list
     */
    public function getAuthorList();
}
