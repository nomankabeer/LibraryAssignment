<?php
/**
 * Created by PhpStorm.
 * User: Noman Kabeer
 * Date: 23-Jan-2020
 * Time: 1:10 AM
 */

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Client\BookRepository;

class BookController extends Controller{

    private $bookRepository = null;
    public function __construct(BookRepository $bookRepository){
    $this->bookRepository = $bookRepository;
    }
    public function searchBook(Request $request){
        return $this->bookRepository->searchBook($request->all());
    }
    public function searchBookView(){
        return view('client.books.search_book');
    }
}
