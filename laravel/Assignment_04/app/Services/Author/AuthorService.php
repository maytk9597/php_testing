<?php

namespace App\Services\Author;

use App\Contracts\Dao\Author\AuthorDaoInterface;
use App\Contracts\Services\Author\AuthorServiceInterface;

class AuthorService implements AuthorServiceInterface
{
    private $authorDao;

    /**
     * Class Constructor
     * @param authorDaoInterface
     * @return
     */
    public function __construct(AuthorDaoInterface $authorDao)
    {
        $this->authorDao = $authorDao;
    }
    /**
     * To get book list
     * @return array $bookList Book list
     */
    public function getAuthorList()
    {
        return $this->authorDao->getAuthorList();
    }
}
