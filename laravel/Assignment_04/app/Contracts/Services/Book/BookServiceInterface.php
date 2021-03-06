<?php

namespace App\Contracts\Services\Book;

use Illuminate\Http\Request;

interface BookServiceInterface
{
    /**
     * To get book list
     * @return array $bookList Book list
     */
    public function getBookList();
    /**
     * To delete book by id
     * @param string $id book id
     * @return string $message message success or not
     */
    public function deletebookById($id);
    /**
     * To save book
     * @param Request $request request with inputs
     * @return Object $book saved book
     */
    public function savebook(Request $request);
    /**
     * To get book by id
     * @param string $id book id
     * @return Object $book book object
     */
    public function getbookById($id);
    /**
     * To update book by id
     * @param Request $request request with inputs
     * @param string $id book id
     * @return Object $book book Object
     */
    public function updatedbookById(Request $request, $id);
    /**
     * To download book info csv file
     * @return File Download CSV file
     */
    public function downloadBookCSV();
    /**
     * To upload csv file for book info
     * @param array $validated Validated values
     * @return array $content Message and Status of CSV Uploaded or not
     */
    public function uploadCSV($validated);

    /**
     * To save book via API
     * @param array $validated Validated values from request
     * @return Object created book object
     */
    public function saveBookAPI($validated);
    /**
     * To update book by id via api
     * @param array $validated Validated values from request
     * @param string $id Book id
     * @return Object $book Book Object
     */
    public function updatedBookByIdAPI($validated, $bookId);
    /*
    * To searh from book list 
    * @return array $bookList Book list
    */
    public function searchBookList($keyword);
    /**
     * To search from book List
     * @param string $start as start date
     * @param string $end as end date
     * @return array $bookList list of books
     */
    public function searchBookListBetweenDate($start, $end);
}
