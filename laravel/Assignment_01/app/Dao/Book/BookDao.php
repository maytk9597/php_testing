<?php

namespace App\Dao\Book;

use App\Contracts\Dao\Book\BookDaoInterface as BookBookDaoInterface;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookDao implements BookBookDaoInterface
{
    public function getBookList()
    {
        $bookList =  DB::table('books')
            ->Join('authors', 'authors.id', '=', 'books.author_id')
            ->whereNull('books.deleted_at')
            ->get('books.*', 'authors.name');
        $msg = "booklist";
        info($msg);
        info($bookList);
        return $bookList;
    }
    /**
     * To delete book
     * @param string $id of book
     * @return Object $delete delete object
     */
    public function deletebookById($id)

    {
        info("Delete");
        $book = Book::find($id);
        if ($book) {
            $book->delete();
            return 'Deleted Successfully!';
        }
        return 'book Not Found!';
    }
    /**
     * To save book
     * @param Request $request request with inputs
     * @return Object $book saved book
     */
    public function savebook(Request $request)
    {
        $book = new Book();
        $book->title = $request['title'];
        $book->type = $request['type'];
        $book->price = $request['price'];
        $book->quantity = $request['quantity'];
        $book->releaseDate = $request['releaseDate'];
        $book->author_id = $request['author_id'];
        $book->save();
        return $book;
    }
    /**
     * To get book by id
     * @param string $id book id
     * @return Object $book book object
     */
    public function getbookById($id)
    {
        $book = Book::find($id);
        return $book;
    }

    /**
     * To update book by id
     * @param Request $request request with inputs
     * @param string $id book id
     * @return Object $book book Object
     */
    public function updatedbookById(Request $request, $id)
    {
        $book = book::find($id);
        $book->title = $request['title'];
        $book->type = $request['type'];
        $book->price = $request['price'];
        $book->quantity = $request['quantity'];
        $book->releaseDate = $request['releaseDate'];
        $book->author_id = $request['author_id'];
        $book->save();
        return $book;
    }

    /**
     * To upload csv file for book
     * @param array $validated Validated values
     * @return array $content Message and Status of CSV Uploaded or not
     */
    public function uploadCSV($validated)
    {
        $path =  $validated['csv_file']->getRealPath();
        $csv_data = array_map('str_getcsv', file($path));
        // save book to Database accoding to csv row
        foreach ($csv_data as $index => $row) {
            if (count($row) >= 2) {
                try {
                    $book = new book();
                    $book->title =  $row[0];
                    $book->type = $row[1];
                    $book->price =  $row[2];
                    $book->quantity =  $row[3];
                    $book->releaseDate = $row[4];
                    $book->author_id =  $row[5];
                    $book->save();
                } catch (\Illuminate\Database\QueryException $e) {
                    $errorCode = $e->errorInfo[1];
                    //error handling for duplicated book
                    if ($errorCode == '1062') {
                        $content = array(
                            'isUploaded' => false,
                            'message' => 'Row number (' . ($index + 1) . ') is duplicated title.'
                        );
                        return $content;
                    }
                }
            } else {
                // error handling for invalid row.
                $content = array(
                    'isUploaded' => false,
                    'message' => 'Row number (' . ($index + 1) . ') is invalid format.'
                );
                return $content;
            }
        }
        $content = array(
            'isUploaded' => true,
            'message' => 'Uploaded Successfully!'
        );
        return $content;
    }
}
