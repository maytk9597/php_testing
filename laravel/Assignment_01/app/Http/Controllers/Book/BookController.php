<?php

namespace App\Http\Controllers\Book;

use App\Contracts\Services\Book\BookServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookCreateRequest;
use App\Http\Requests\UploadRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * book interface
     */
    private $bookInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookServiceInterface $bookServiceInterface)
    {
        $this->bookInterface = $bookServiceInterface;
    }
    /**
     * To show Book list
     *
     * @return View Book list
     */
    public function showBookList()
    {
        $bookList = $this->bookInterface->getBookList();
        info($bookList);
        return view('book.list', compact('bookList'));
    }
    /**
     * To delete book by id
     * @return View book list
     */
    public function deleteBookById($id)
    {
        info($id);
        $msg = $this->bookInterface->deletebookById($id);

        info($msg);

        return redirect('/');
    }
    /**
     * To show create book view
     * 
     * @return View create book
     */
    public function showbookCreateView()
    {
        return view('book.create');
    }

    /**
     * To check book create form and redirect to confirm page.
     * @param bookCreateRequest $request Request form book create
     * @return View book create confirm
     */
    public function submitbookCreateView(BookCreateRequest $request)
    {
        // validation for request values
        $validated = $request->validated();
        $book = $this->bookInterface->savebook($request);
        return redirect()->route('booklist');
    }
    /**
     * Show book edit
     * 
     * @return View book edit
     */
    public function showBookEdit($id)
    {
        $book = $this->bookInterface->getbookById($id);
        return view('book.edit', compact('book'));
    }

    /**
     * Submit book edit
     * @param Request $request
     * @param $id
     * @return View book edit confirm view
     */
    public function submitBookEditView(BookCreateRequest $request, $id)
    {
        $request->validated();
        $this->bookInterface->updatedbookById($request, $id);
        return redirect()->route('booklist');
    }
    /**
     * To download book csv file
     * @return File Download CSV file
     */
    public function downloadbookCSV()
    {
        return $this->bookInterface->downloadbookCSV();
    }
    /**
     * To show create book view
     * 
     * @return View create book
     */
    public function showUploadView()
    {
        return view('book.upload');
    }

    /**
     * To submit CSV upload view
     * 
     * @param Request $request Request from book upload
     * @return view book list
     */
    public function submitUpload(UploadRequest $request)
    {
        // validation for request values
        $validated = $request->validated();
        $content = $this->bookInterface->uploadCSV($validated);
        if (!$content['isUploaded']) {
            return redirect('/book/upload')->with('error', $content['message']);
        } else {
            return redirect()->route('booklist');
        }
    }
}
