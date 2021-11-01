<?php

namespace App\Contracts\Dao\Book;

use Illuminate\Http\Request;

interface BookDaoInterface
{
    public function getBookList();
    /**
     * To delete book
     * @param string $id of book
     * @return Object $delete delete object
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
     * To upload csv file for book
     * @param array $validated Validated values
     * @return array $content Message and Status of CSV Uploaded or not
     */
    public function uploadCSV($validated);
}
