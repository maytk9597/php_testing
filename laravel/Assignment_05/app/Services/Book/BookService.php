<?php

namespace App\Services\Book;

use App\Contracts\Dao\Book\BookDaoInterface as BookBookDaoInterface;
use App\Contracts\Services\Book\BookDaoInterface;
use App\Contracts\Services\Book\BookServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookService implements BookServiceInterface
{
    private $bookDao;

    /**
     * Class Constructor
     * @param bookDaoInterface
     * @return
     */
    public function __construct(BookBookDaoInterface $bookDao)
    {
        $this->bookDao = $bookDao;
    }
    /**
     * To get book list
     * @return array $bookList Book list
     */
    public function getBookList()
    {
        return $this->bookDao->getBookList();
    }

    /**
     * To delete book by id
     * @param string $id book id
     * @return string $message message success or not
     */
    public function deletebookById($id)
    {
        return $this->bookDao->deletebookById($id);
    }
    /**
     * To save book
     * @param Request $request request with inputs
     * @return Object $book saved book
     */
    public function savebook(Request $request)
    {
        return $this->bookDao->savebook($request);
    }
    /**
     * To get book by id
     * @param string $id book id
     * @return Object $book book object
     */
    public function getbookById($id)
    {
        return $this->bookDao->getbookById($id);
    }

    /**
     * To update book by id
     * @param Request $request request with inputs
     * @param string $id book id
     * @return Object $book book Object
     */
    public function updatedbookById(Request $request, $id)
    {
        return $this->bookDao->updatedbookById($request, $id);
    }
    /**
     * To download book info csv file
     * @return File Download CSV file
     */
    public function downloadBookCSV()
    {
        $bookList = $this->bookDao->getBookList();
        $filename = "book.csv";
        //write csv file
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array('Title', 'Type', 'Price', 'Quantity', 'Released Date', 'Author Id'));
        foreach ($bookList as $row) {
            fputcsv($handle, array(
                $row->title, $row->type, $row->price, $row->quantity,
                date('Y/m/d', strtotime($row->releaseDate)), $row->author_id,
            ));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return response()
            ->download($filename, $filename, $headers)
            ->deleteFileAfterSend();
    }
    /**
     * To upload csv file for book
     * @param array $validated Validated values
     * @return array $content Message and Status of CSV Uploaded or not
     */
    public function uploadCSV($validated)
    {
        $fileName = $validated['csv_file']->getClientOriginalName();
        Storage::putFileAs(config('path.csv') .
            config('path.separator'), $validated['csv_file'], $fileName);
        return $this->bookDao->uploadCSV($validated);
    }
    /*
    * To searh from book list 
    * @param string $keyword to search
    * @return array $bookList Book list
    */
    public function searchBookList($keyword)
    {
        return $this->bookDao->searchBookList($keyword);
    }
    /**
     * To search from book List
     * @param string $start as start date
     * @param string $end as end date
     * @return array $bookList list of books
     */
    public function searchBookListBetweenDate($start, $end)
    {
        return $this->bookDao->searchBookListBetweenDate($start, $end);
    }
    /**
     * To save book via API
     * @param array $validated Validated values from request
     * @return Object created book object
     */
    public function saveBookAPI($validated)
    {
        return $this->bookDao->saveBookAPI($validated);
    }

    /**
     * To update book by id via api
     * @param array $validated Validated values from request
     * @param string $id Book id
     * @return Object $book Book Object
     */
    public function updatedBookByIdAPI($validated, $bookId)
    {
        return $this->bookDao->updatedBookByIdAPI($validated, $bookId);
    }
}
