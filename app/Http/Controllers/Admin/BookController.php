<?php
/**
 * Created by PhpStorm.
 * User: Noman Kabeer
 * Date: 23-Jan-2020
 * Time: 1:10 AM
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\BookRepository;

class BookController extends Controller{

    private $bookRepository = null;
    public function __construct(BookRepository $bookRepository){
    $this->bookRepository = $bookRepository;
    }
    public function createBook($rack_id){
        return view('admin.Books.create' , compact('rack_id'));
    }
    public function storeBook(Request $request){
        return $this->bookRepository->storeBook($request->all());
    }
    public function editBook($id){
        return $this->bookRepository->editBook($id);
    }
    public function updateBook($id , Request $request){
        return $this->bookRepository->updateBook($request->all() , $id);
    }
    public function deleteBook($id){
        return $this->bookRepository->deleteBook($id);
    }
}
