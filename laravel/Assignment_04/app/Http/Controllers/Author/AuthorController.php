<?php

namespace App\Http\Controllers\Author;

use App\Contracts\Services\Author\AuthorServiceInterface;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{
    /**
     * book interface
     */
    private $authorInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthorServiceInterface $bookServiceInterface)
    {
        $this->authorInterface = $bookServiceInterface;
    }
    /**
     * To show author list
     *
     * @return View author list
     */
    public function showAuthorList()
    {
        $authorList = $this->authorInterface->getAuthorList();
        return view('author.list', compact('authorList'));
    }
}
