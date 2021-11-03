<?php

namespace App\Http\Controllers\API\Book;

use App\Contracts\Services\Book\BookServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookCreateAPIRequest;
use App\Http\Requests\BookEditAPIRequest;
use App\Http\Requests\UploadRequest;
use Illuminate\Http\JsonResponse;

class BookAPIController extends Controller
{
    /**
     * Book Interface
     */
    private $bookInterface;

    public function __construct(BookServiceInterface $bookServiceInterface)
    {
        $this->bookInterface = $bookServiceInterface;
    }

    /**
     * This is to get book list.
     * @return Response json with book list
     */
    public function showBookList()
    {
        $bookList = $this->bookInterface->getBookList();
        return response()->json($bookList);
    }

    /**
     * To delete book by id via api
     * @param string $bookid user id
     * @return Response message
     */
    public function deleteBookById($id)
    {
        $msg = $this->bookInterface->deleteBookById($id);
        return response(['message' => $msg]);
    }

    /**
     * To create book via API
     * @param BookCreateAPIRequest $request request via API
     * @return Response json created user
     */
    public function createBook(BookCreateAPIRequest $request)
    {
        // validation for request values
        $validated = $request->validated();
        $book = $this->bookInterface->saveBookAPI($validated);
        return response()->json($book);
    }

    /**
     * To Update book via API
     * @param BookEditAPIRequest $request request via API
     * @param string $bookId book id
     * @return Response json updated book.
     */
    public function updateBook(BookEditAPIRequest $request, $id)
    {
        $validated = $request->validated();
        $book = $this->bookInterface->updatedBookByIdAPI($validated, $id);
        return response()->json($book);
    }

    /**
     * To get book by id via API
     * @param string $bookId book id
     * @return Response json book object
     */
    public function getBookById($id)
    {
        $book = $this->bookInterface->getBookById($id);
        return response()->json($book);
    }

    public function uploadBookCSVFile(UploadRequest $request)
    {
        $validated = $request->validated();
        $content = $this->bookInterface->uploadCSV($validated);
        if (!$content['isUploaded']) {
            return response()->json(['error' => $content['message']], JsonResponse::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $content['message']]);
        }
    }
}
