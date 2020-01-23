<?php
/**
 * Created by PhpStorm.
 * User: Noman Kabeer
 * Date: 23-Jan-2020
 * Time: 1:12 AM
 */

namespace App\Repositories\Client;
use App\Books;
use App\Racks;
use Illuminate\Support\Facades\Validator;
class BookRepository {

   public function searchBook($data){
       Validator::make($data, [
           'search' => ['required', 'string', 'min:2' , 'max:20']
       ])->validate();
       $books = Books::with('rack')->where('title','LIKE','%'.$data['search'].'%')->orWhere('author','LIKE','%'.$data['search'].'%')->orWhere('published_year','LIKE','%'.$data['search'].'%')->get();
       if($books->count() > 0){
           session(['success' => 'Book Found']);
           return view('client.books.search_book' , compact('books'));
       }
       else{
           session(['error' => 'Book Not Found']);
           return view('client.books.search_book');
       }
   }
}
